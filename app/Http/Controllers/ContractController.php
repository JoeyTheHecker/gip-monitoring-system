<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContractController extends Controller
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
    public function store(Request $request, $id)
    {   

       try
       {
            $applicant = Applicant::with('contracts')->find($id);

            $remainingDays = $this->getRemainingDays($applicant->contracts->sum('diff_days'));

            if($request->diff_days <= $remainingDays){
                Contract::create([
                    'applicant_id' => $id,
                    'effective_start_date' => $request->effective_start_date,
                    'effective_end_date' => $request->effective_end_date,
                    'diff_days' => $request->diff_days,
                    'office_place_assignment' => $request->office_place_assignment,
                    'work_contract_person' => $request->work_contract_person,
                ]);

                Alert::success('Success', 'Successfully added new contract...');
                return redirect()->back();
            }else{
                Alert::error('Ooppss', 'Applicant should not have exceeded 365 days or 1 year of their overall contracts.')->persistent(false);
                return redirect()->back();
            }
       } catch (\Exception $e){
            Alert::error('oppss', 'Please try again...');
            return redirect()->back();
       }

    }


    function getRemainingDays($val){
        $remainingDays = 365 - $val;
        return $remainingDays;
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    public function resigned(Request $request, $id)
    {   
        try {

            $contract = Contract::Find($id);
            $startDate = Carbon::parse($contract->effective_start_date); // Replace this with your start date
            $endDate = Carbon::parse($request->resignation_date);   // Replace this with your end date
            
            $daysDifference = $endDate->diffInDays($startDate);
            $totalDays = $daysDifference + 1;
           if($startDate > $endDate){
                Alert::error('Oooppss', 'Select the date beyond effective start date...');
                return redirect()->back();
                
           }else {
                $contract->update([
                    'effective_end_date' => $request->resignation_date,
                    'diff_days' => $totalDays,
                    'status' => 'resigned',
                ]);

            Alert::success('Success', 'Successfully updated...');
            return redirect()->back();
           }

        }catch (\Exception $e){
            Alert::error('oppss', 'Please try again...');
            return redirect()->back();
        }


    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
