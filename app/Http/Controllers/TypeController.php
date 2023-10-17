<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;

class TypeController extends Controller
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
        $types = Type::where('type_name', 'LIKE', "%$query%")->paginate(10);
        return view('owner.types', compact('types'));
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
    public function store(StoreTypeRequest $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        Type::create($request->all());
        return redirect()->route('type.index')->with('success', 'Type added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->all());
        return redirect()->route('type.index')->with('success', 'Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $item = Item::where('type_id', $type->id)->first();
        if($item) {
            return redirect()->route('type.index')->with('error', 'Type cannot be deleted because it is associated with an item');
        }
        $type->delete();
        return redirect()->route('type.index')->with('success', 'Type deleted successfully');
    }
}
