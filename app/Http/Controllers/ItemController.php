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
        $user = Auth::user();
        if (!Auth::check()) {
            return view('auth.login');
        }

        $query = $request->input('query');
        $items = Item::where('item_name', 'LIKE', "%$query%")->paginate(10);
        $units = Unit::all();
        $categories = Category::all();
        $types = Type::all();
        $item_batches = ItemBatch::all();

        if ($user->role == 'owner') {
            $item_histories = ItemHistory::orderBy('id', 'desc')->paginate(10);
            $users = User::all();
            return view('owner.items', compact('items', 'units', 'categories', 'item_histories', 'users', 'types', 'item_batches'));
        } elseif ($user->role == 'employee') {
            return view('employee.items', compact('items', 'units', 'categories', 'types', 'item_batches'));
        }
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
        $user = Auth::user();
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('item_images', 'public'); 
        } else {
            $imagePath = null;
        }

        Item::create([
            'unit_id' => $request->input('unit_id'),
            'category_id' => $request->input('category_id'),
            'type_id' => $request->input('type_id'),
            'item_name' => $request->input('item_name'),
            'image' => $imagePath,
            'description' => $request->input('description'),
            'cost' => $request->input('cost'),
            'stock_used_per_day' => $request->input('stock_used_per_day'),
            'created_by' => $user->id
        ]);


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

    $imagePath = $item->image;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('item_images', 'public');
    }

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




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {

        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item deleted successfully');
    }
}
