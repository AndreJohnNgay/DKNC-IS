<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Item;
class UnitController extends Controller
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
        $units = Unit::where('unit_name', 'LIKE', "%$query%")->paginate(10);
        return view('owner.units', compact('units'));
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
    public function store(StoreUnitRequest $request)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        Unit::create($request->all());
        $unit_name = $request->unit_name;
        return redirect()->route('unit.index')->with('success', 'Unit: '. $unit_name .'  added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->all());
        return redirect()->route('unit.index')->with('success', 'Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $item = Item::where('unit_id', $unit->id)->first();
        if($item) {
            return redirect()->route('unit.index')->with('error', 'Unit "'. $unit->unit_name .'" cannot be deleted because it is associated with an item');
        }
        $unit->delete();
        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully');
    }
}
