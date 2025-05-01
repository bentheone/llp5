<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard() {
        if (!Auth::check()) {
            dd("User not authenticated");
        };
        $user = Auth::user();
        $totalJobs = $user->jobs()->count();
        $totalApplicants = $user->applicants()->count();
        $totalApplications = $user->applicantions()->count();
        $totalStages = $user->stages()->count();

        return view('dashboard', compact('user','totalJobs', 'totalApplicants', 'totalApplications', 'totalStages'));
    }
}
