<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Applicant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $currentDate = Carbon::now(); // Get the current date and time
        $currentMonth = $currentDate->format('m'); // Get the current month
        $currentYear = $currentDate->format('Y'); // Get the current year

        // $latestApplicants = Applicant::whereMonth('created_at', $currentMonth)
        //                     ->whereYear('created_at', $currentYear)
        //                     ->latest()
        //                     ->get();
        $yearApplicants = Applicant::with('contracts')->get()
                            ->filter(function ($a){
                                return $a->contracts->sum('diff_days') > 340;
                            });

        $totalApplicants = Applicant::count();
        $totalMale = Applicant::where('gender', 'male')->count();
        $totalFemale = Applicant::where('gender', 'female')->count();

        // $single = Applicant::where('civil_status', 'single')->count();
        // $maried = Applicant::where('civil_status', 'married')->count();
        // $widow_widower = Applicant::where('civil_status', 'widow_widower')->count();


        // $total_single = "['Single', $single],";
        // $total_maried = "['Married', $maried],";
        // $total_widow_widower= "['Widow/Widower', $widow_widower]";
        return view('home',compact('totalApplicants','totalMale','totalFemale','yearApplicants'));
    }
}
