<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use App\Models\Project;
use Illuminate\Http\Request;

class AHomeController extends Controller
{
    public function index()
    {
        $funds = Funds::sum('funds_collected');
        $project = Project::get()->count();

        $data = Funds::with('project')->get();

        // Mengambil data berat, tinggi, dan lingkar kepala dari riwayat posyandu
        $chartData = [
            'project' => $data->pluck('project.name')->toArray(),
            'funds' => $data->pluck('funds_collected')->toArray(),
        ];

        return view('admin.home.index', compact('project', 'funds', 'chartData'));
    }
}
