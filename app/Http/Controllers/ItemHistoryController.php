<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use App\Http\Requests\StoreItemHistoryRequest;
use App\Http\Requests\UpdateItemHistoryRequest;

class ItemHistoryController extends Controller
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
    public function store(StoreItemHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemHistory $itemHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemHistory $itemHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemHistoryRequest $request, ItemHistory $itemHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemHistory $itemHistory)
    {
        //
    }
}
