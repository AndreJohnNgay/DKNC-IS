<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        
        if ($role === 'owner') {
            $units = Unit::where('unit_name', 'LIKE', "%$query%")->paginate(10);
            return view('owner.units', compact('units'));
        } elseif ($role === 'employee') {
            
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
        $unit->delete();
        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully');
    }
}
