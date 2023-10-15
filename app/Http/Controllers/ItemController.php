<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\Category;
use App\Models\User;
use App\Models\Type;
use App\Models\ItemBatch;
use App\Models\ItemHistory;
use App\Events\ItemUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $role = Auth::user()->role;
        $query = $request->input('query');

        $items = Item::where('item_name', 'LIKE', "%$query%")->paginate(10);
        $units = Unit::all();
        $categories = Category::all();
        $types = Type::all();
        $item_batches = ItemBatch::all();

        if ($role === 'owner') {
            $item_histories = ItemHistory::orderBy('id', 'desc')->paginate(10);
            $users = User::all();
            return view('owner.items', compact('items', 'units', 'categories', 'item_histories', 'users', 'types', 'item_batches'));
        } elseif ($role === 'employee') {
            return view('employee.items', compact('items', 'units', 'categories', 'types', 'item_batches'));
        }

        return view('auth.login');
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
    public function store(StoreItemRequest $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'item_name' => 'required|string|max:255',
            'image' => 'image|max:2048',
            'description' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'stock_used_per_day' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('item_images', 'public'); // Store image in storage/app/public/item_images
        } else {
            $imagePath = null;
        }

        $user = Auth::user();

        $item = new Item;
        $item->unit_id = $request->input('unit_id');
        $item->category_id = $request->input('category_id');
        $item->type_id = $request->input('type_id');
        $item->item_name = $request->input('item_name');
        $item->image = $imagePath; // Save image path to the database
        $item->description = $request->input('description');
        $item->cost = $request->input('cost');
        $item->stock = $request->input('stock');
        $item->stock_used_per_day = $request->input('stock_used_per_day');
        $item->created_by = $user->id;
        $item->save();

        return redirect()->route('item.index')->with('success', 'Item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {

    }

    public function search(Request $request)
    {
        $role = Auth::user()->role;
        if (Auth::check()) {
            $query = $request->input('query');
            $items = Item::where('item_name', 'LIKE', "%$query%")->get();
            $units = Unit::all();
            $categories = Category::all();
            $types = Type::all();
            if ($role === 'owner') {
                $item_histories = ItemHistory::orderBy('id', 'desc')->get();
                $users = User::all();
                return view('owner.items_search', compact('items', 'units', 'categories', 'item_histories', 'users', 'types'), ['query' => $query]);
            }
            elseif ($role === 'employee') {
                return view('employee.items_search', compact('items', 'units', 'categories', 'types'), ['query' => $query]);
            }
        }
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
       // Validate the request
       $request->validate([
            'unit_id' => 'required|exists:units,id',
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:types,id',
            'item_name' => 'required|string|max:255',
            'image' => 'image|max:2048',
            'description' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'stock_used_per_day' => 'required|integer',
        ]);

    // Handle image upload
    $imagePath = $item->image;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('item_images', 'public');
    }

    // Update item details
    $item->update([
        'unit_id' => $request->input('unit_id'),
        'category_id' => $request->input('category_id'),
        'type_id' => $request->input('type_id'),
        'item_name' => $request->input('item_name'),
        'image' => $imagePath,
        'description' => $request->input('description'),
        'cost' => $request->input('cost'),
        'stock_used_per_day' => $request->input('stock_used_per_day'),
    ]);

    return redirect()->route('item.index')->with('success', 'Item updated successfully');
    }


    public function updateStock(UpdateItemRequest $request, Item $item)
    {
        $request->validate([
            'amount' => 'required|integer'
        ]);

        $add_or_reduce_stock = $request->add_or_reduce_stock;
        $amount = $request->amount;

        if($add_or_reduce_stock == 'add'){
            $stock = $item->stock + $amount;
        }
        elseif($add_or_reduce_stock == 'reduce'){
            $stock = $item->stock - $amount;
        }
        else{
            return redirect()->route('item.index')->with('error', 'Invalid action');
        }

        $item->stock = $stock;
        $item->save();
        return redirect()->route('item.index')->with('success', 'Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }
}
