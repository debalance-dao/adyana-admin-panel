<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use App\Models\FundsAllocation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FundsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Funds::with('project')->get();
        return view('admin.funds.index', compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = Project::all();
        return view('admin.funds.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'total_investor' => 'required',
            'funds_collected' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->route('funds.create')->with(['error' => 'Data cannot to be save!']);
        }

        $req = $request->all();

        $fundsData = Funds::create($req);

        if ($request->funds) {
            foreach ($request->funds as $funds) {
                FundsAllocation::create([
                    'funds_id' => $fundsData->id,
                    'name' => $funds['name'],
                    'percentage' => $funds['percentage'],
                ]);
            }
        }

        return redirect()->route('funds.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Funds $funds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($funds)
    {
        $funds = Funds::with('project')->with('fundsAllocation')->find($funds);
        return view('admin.funds.edit', compact('funds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funds $fund)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'total_investor' => 'required',
            'funds_collected' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->route('funds.edit', [$fund->id])->with(['error' => 'Data cannot to be save!']);
        }

        $input['project_id'] = $request->project_id;
        $input['total_investor'] = $request->total_investor;
        $input['funds_collected'] = $request->funds_collected;

        $fund->update($input);

        if ($request->fundsAllocation) {
            $existingFunds = $fund->fundsAllocation()->pluck('id')->toArray();
            $newFunds = array_column($request->fundsAllocation, 'id');

            // Delete funds that are not in the request
            $fundsToDelete = array_diff($existingFunds, $newFunds);
            if (!empty($fundsToDelete)) {
                FundsAllocation::destroy($fundsToDelete);
            }

            // Update or create funds
            foreach ($request->fundsAllocation as $fundsAllocation) {
                if (isset($fundsAllocation['id']) && in_array($fundsAllocation['id'], $existingFunds)) {
                    $fund->fundsAllocation()->where('id', $fundsAllocation['id'])->update([
                        'name' => $fundsAllocation['name'],
                        'percentage' => $fundsAllocation['percentage'],
                    ]);
                } else {
                    $fund->fundsAllocation()->create([
                        'funds_id' => $fund['id'],
                        'name' => $fundsAllocation['name'],
                        'percentage' => $fundsAllocation['percentage'],
                    ]);
                }
            }
        }

        return redirect()->route('funds.index')->with(['success' => 'Data Saved!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funds $fund)
    {
        try {
            $fund->delete();
            $fund->fundsAllocation()->delete();
            if (request()->header('Content-Type') === "application/json") {
                return response()->json($fund);
            }
            return redirect()->route('funds.index')->with(['success' => 'Data Deleted!']);
        } catch (\Exception $e) {
            return redirect()->route('funds.index')->with(['error' => 'Data Cannot be Deleted!']);
        }
    }
}
