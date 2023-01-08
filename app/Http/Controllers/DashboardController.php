<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Incident\Incident;
use App\Models\Respondent;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $incident = Incident::count();
        $respondent = Respondent::count();
        $team = Team::count();
        $incidents = Incident::orderBy('id','desc')->limit(10)->get();
        return Inertia::render('Dashboard',compact('incident','respondent','team','incidents'));
    }

    public function exportDashboard(){
        $incidents = Incident::orderBy('id','desc')->limit(10)->get();
        $incident = Incident::count();
        $respondent = Respondent::count();
        $team = Team::count();
        $pdf = Pdf::loadView('dashboard',compact('team','incident','respondent','incidents'));
//        return $pdf->download('dashboard.pdf');
        return $pdf->stream();
    }
}
