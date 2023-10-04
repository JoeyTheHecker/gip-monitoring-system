<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantController extends Controller
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
        return view('applicant.create');
    }

      /**
     * Generate code
     */
     function generateApplicantNumber(){
        $latestApplicant = NULL;
        // $m = date('m');
        $y = date('Y');

        $latestApplicant = Applicant::orderBy('created_at', 'desc')->pluck('applicant_code')->first();
        // dd($latestApplicant);
        if(!$latestApplicant){
            $code = 'gip-dole-tssd-'.$y.'-1';
            // dd($code);
            //MO-RO8-03-2023-001
            //GIP-DOLE-TSSD-2023-1
            return $code; 
        }else{
            $num = substr($latestApplicant,19);
            $int_num = (int)$num;
        }

        $queue = $int_num + 1;
        $code = 'gip-dole-tssd-'.$y.'-'.$queue;
        return $code;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $applicant_code = $this->generateApplicantNumber();
        $profile_picture = $applicant_code.'.'.$request->profile_picture->getClientOriginalExtension();
       try {
            DB::transaction(function () use ($request, $applicant_code, $profile_picture){
                // throw new \Exception("Error");
                Applicant::create([
                    'applicant_code' => $applicant_code,
                    'applicant_first_name' => $request->applicant_first_name,
                    'applicant_middle_name' => $request->applicant_middle_name,
                    'applicant_last_name' => $request->applicant_last_name,
                    'profile_picture' => $profile_picture,
                    'residential_address' => $request->residential_address,
                    'telephone_nnumber' => $request->telephone_number,
                    'mobile_number' => $request->mobile_number,
                    'email' => $request->email,
                    'place_of_birth' => $request->place_of_birth,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'civil_status' => $request->civil_status
                ]);

                $request->profile_picture->move('profile_pictures',$profile_picture);
            });
       } catch (\Exception $e){
            Alert::error('oppss', 'Please try again...');
            return redirect()->back();
       }
       
       Alert::success('Success', 'Successfully registered...');
       return redirect()->back();
    }


    /**
     * Display list of applicant.
     */
    public function list()
    {
        $applicantLists = Applicant::all();
        return view('applicant.list',compact('applicantLists'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   


        $applicantProfile = Applicant::with('contracts')->find($id);
        
        (int)$sumDiffDays = $applicantProfile->contracts->sum('diff_days');
        $remainingDays = $this->getRemainingDays($sumDiffDays);

        return view('applicant.show', compact('applicantProfile','sumDiffDays','remainingDays'));
    }


    function getRemainingDays($val){
        $remainingDays = 365 - $val;
        return $remainingDays;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
