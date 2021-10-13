<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        $total = $agenda->count();

        //hari ini
        $today = $agenda->where('created_at', '>=', Carbon::today())->count();

        //selesai
        $selesai = $agenda->where('status', 'Selesai')->count();
        return view('dashboard.index', compact('total', 'selesai', 'today'));
    }
}
