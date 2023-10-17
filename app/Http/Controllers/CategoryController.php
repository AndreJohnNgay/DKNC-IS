<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;

class CategoryController extends Controller
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

        if($user->role != 'owner') {
            return redirect()->route('item.index')->with('error', 'You do not have permission to access this page');
        }

        $query = $request->input('query');
        $categories = Category::where('category_name', 'LIKE', "%$query%")->paginate(10);
        return view('owner.categories', compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        Category::create($request->all());
        $category_name = $request->category_name;
        return redirect()->route('category.index')->with('success', 'Category: '. $category_name .'  added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $category->update($request->all());
        return redirect()->route('category.index')->with('success', 'Category: '. $category->category_name .'  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $item = Item::where('category_id', $category->id)->first();
        if ($item) {
            return redirect()->route('category.index')->with('error', 'Category "'. $category->category_name .'" cannot be deleted because it is associated with an item');
        }

        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category "'. $category->category_name .'" deleted successfully');
    }
}
