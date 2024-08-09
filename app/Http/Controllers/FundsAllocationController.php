<?php

namespace App\Http\Controllers;

use App\Models\FundsAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FundsAllocationController extends Controller
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'funds_id' => 'required',
            'name' => 'required',
            'percentage' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->route('funds.create')->with(['error' => 'Data cannot to be save!']);
        }

        $req = $request->all();

        FundsAllocation::create($req);

        return redirect()->route('funds.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(FundsAllocation $fundsAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundsAllocation $fundsAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FundsAllocation $fundsAllocation)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'percentage' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->route('funds.create')->with(['error' => 'Data cannot to be save!']);
        }

        $req = $request->all();

        $fundsAllocation->update($req);

        return redirect()->route('funds.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundsAllocation $fundsAllocation)
    {
        //
    }
}
