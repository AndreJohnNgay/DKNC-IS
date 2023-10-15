<?php

namespace App\Http\Controllers;

use App\Models\ItemBatch;
use App\Http\Requests\StoreItemBatchRequest;
use App\Http\Requests\UpdateItemBatchRequest;
use App\Models\Item;
use App\Models\ItemHistory;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;
use App\Events\BatchUpdated;
use Illuminate\Http\Request;  
class ItemBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemBatchRequest $request)
    {
        $latest_batch_no = ItemBatch::where('item_id', $request->input('item_id'))->max('batch_no');
        $batch_no = $latest_batch_no + 1;
        ItemBatch::create([
            'item_id' => $request->input('item_id'),
            'batch_no' => $batch_no,
            'stock' => $request->input('stock'),
            'expiration_date' => $request->input('expiration_date'),
        ]);
        $item = Item::where('id', $request->input('item_id'))->firstOrFail();
        $item->update([
            'stock' => $item->stock + $request->stock,
        ]);

        return redirect()->route('item.index')->with('success', 'Batch added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemBatch $itemBatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemBatch $itemBatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemBatchRequest $request, $item_batch_id)
    {
        $amount = $request->input('amount');
        $add_reduce = $request->input('add_reduce');
    
        $itemBatch = ItemBatch::find($item_batch_id);
        $item = Item::where('id', $itemBatch->item_id)->firstOrFail();
    
        if ($add_reduce == 'add') {
            $itemBatch->update([
                'stock' => $itemBatch->stock + $amount,
                'expiration_date' => $request->input('expiration_date'),
            ]);

            $item->update([
                'stock' => $item->stock + $amount,
            ]);

            $addStockMessage = 'Stock increased for batch ' . $itemBatch->batch_no . ': Previous stock was ' . $itemBatch->stock - $amount . ', new stock is ' . ($itemBatch->stock) . '.';
            ItemHistory::create([
                'item' => $item->id,
                'updated_by' => Auth::id(),
                'action' => $addStockMessage,
            ]);
        } elseif ($add_reduce == 'reduce') {

            $itemBatch->update([
                'stock' => $itemBatch->stock - $amount,
                'expiration_date' => $request->input('expiration_date'),
            ]);

            $item->update([
                'stock' => $item->stock - $amount,
            ]);

            $reduceStockMessage = 'Stock reduced for batch ' . $itemBatch->batch_no . ': Previous stock was ' . $itemBatch->stock + $amount . ', new stock is ' . ($itemBatch->stock) . '.';
            ItemHistory::create([
                'item' => $item->id,
                'updated_by' => Auth::id(),
                'action' => $reduceStockMessage,
            ]);
        }
    
        
        // $item->update([
        //     'stock' => $item->stock + ($add_reduce == 'add' ? $amount : -$amount),
        // ]);

    
        return redirect()->route('item.index')->with('success', 'Stock updated successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $itemBatch = ItemBatch::findOrFail($request->input('item_batch_id'));
        $item = Item::findOrFail($request->input('item_id'));

        $item->update([
            'stock' => $item->stock - $itemBatch->stock,
        ]);
        
        $itemBatch->delete();
        return redirect()->route('item.index')->with('success', 'Batch deleted successfully');
    }

}
