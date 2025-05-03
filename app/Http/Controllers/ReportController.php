<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Applicantion;
use App\Models\Stage;
class ReportController extends Controller
{
    public function dailyReport(Request $request)
{
    $date = $request->input('date', null);

    $applications = collect();

    if ($date) {
        $applications = Applicantion::with(['job', 'applicant', 'stage'])
            ->whereDate('created_at', $date)
            ->get();
    }

    return view('report', compact('applications', 'date'));
}

}
