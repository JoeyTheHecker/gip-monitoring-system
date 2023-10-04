@extends('layouts.app')

@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
{{-- <div class="container-fluid">

   <h1>This is admin</h1>

</div> --}}
<style>
    /* You can use nth-child(1), nth-child(2), etc., to target specific columns */
    /* For this example, let's adjust the width of the first and second columns */
    /* td:nth-child(1) {
    width: 40px;
    } */
    td:nth-child(1) {  
    width: 80px; 
    }
    td:nth-child(2) {
    width: 100px;
    }
    td:nth-child(3) {
    width: 40px;
    }
    td:nth-child(4) {
    width: 70px;
    }
    td:nth-child(5) {
    width: 100px;
    }
    td:nth-child(6) {
    width: 100px;
    }
    td:nth-child(7) {
    width: 50px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid">

    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <section style="background-color: #eee;">
                                    <div class="container py-5">
                                      
                                  
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <div class="card mb-4">
                                            <div class="card-body text-center">
                                              <img src="{{ asset('profile_pictures/'. $applicantProfile->profile_picture) }}" alt="avatar"
                                                class="rounded-circle img-fluid" style="width: 150px;">
                                              <h5 class="my-3">{{ Str::ucfirst(strtolower($applicantProfile->applicant_first_name)) }} {{ strtoupper(Str::substr($applicantProfile->applicant_middle_name, 0, 1)) }}. {{ Str::ucfirst(strtolower($applicantProfile->applicant_last_name)) }}</h5>
                                              <p class="text-muted mb-1">{{ strtoupper($applicantProfile->applicant_code) }}</p>
                                              <p class="text-muted mb-4">{{ $applicantProfile->residential_address }}</p>
                                              <div class="d-flex justify-content-center mb-2">
                                                {{-- <button type="button" class="btn btn-primary">Follow</button> --}}
                                                <button type="button" class="btn btn-outline-primary ms-1" data-bs-toggle="modal" data-bs-target="#myModal">Add Contract</button>
                                              </div>
                                              <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">New Contract</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('contract.store', $applicantProfile->id) }}" method="POST" enctype="multipart/form-data">
                                                            {{-- @method('PATCH') --}}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <div class="mb-4">
                                                                        <label class="form-label"><b>Effective Start Date</b></label>
                                                                        <input type="date" class="form-control" id="effective_start_date" name="effective_start_date"  required>
                                                                    </div>
                                                                    
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Effective End Date</label>
                                                                        <input type="date" class="form-control" id="effective_end_date" name="effective_end_date"  required>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                      <label class="form-label">Days between dates:</label>
                                                                      <input type="text" class="form-control" id="diff_days" name="diff_days" value="" hidden>
                                                                      <div id="total_days_output"></div>
                                                                  </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Office and Place of Assignment</label>
                                                                        <textarea name="office_place_assignment" id="" cols="20" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                      <label class="form-label">Work Contract Person</label>
                                                                      <input type="text" class="form-control" name="work_contract_person">
                                                                  </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" id="submit-contract" class="btn btn-success">Save</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="card mb-4 mb-lg-0">
                                            <div class="card-body p-0">
                                              <ul class="list-group list-group-flush rounded-3">
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                  Note: Applicant should not have exceeded 365 days or 1 year of their overall contracts.</i>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                  Total days consumed:</i>
                                                  <p class="mb-0">{{ $sumDiffDays }} days</p>
                                                  <input type="text" value="{{ $sumDiffDays }}" hidden id="sum_diff_days">
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                  Remaining days can be used:</i>
                                                  <p class="mb-0">{{ $remainingDays }} days</p>
                                                  <input type="text" value="{{ $remainingDays }}" hidden id="remaining_days">
                                                </li>
                                                {{-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                                  <p class="mb-0">@mdbootstrap</p>
                                                </li> --}}
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-8">
                                          <div class="card mb-4">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">First Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ Str::ucfirst(strtolower($applicantProfile->applicant_first_name)) }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Middle Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ Str::ucfirst(strtolower($applicantProfile->applicant_middle_name)) }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Last Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ Str::ucfirst(strtolower($applicantProfile->applicant_last_name)) }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ $applicantProfile->email }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ $applicantProfile->telephone_number }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Mobile</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ $applicantProfile->mobile_number }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Place of Birth</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ $applicantProfile->place_of_birth }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Date of Birth</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ $applicantProfile->date_of_birth }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Gender</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ Str::ucfirst($applicantProfile->gender) }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <p class="mb-0">Civil Status</p>
                                                </div>
                                                <div class="col-sm-9">
                                                  <p class="text-muted mb-0">{{ Str::ucfirst($applicantProfile->civil_status) }}</p>
                                                </div>
                                              </div>
                                              <hr>
                                              
                                            </div>
                                          </div>
                                        
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                  <br>
                                  <br>
                                  <h4 class="card-title">List of Contracts</h4>
                                {{-- <p class="card-title-desc">DataTables has most features enabled by
                                    default, so all you need to do to use it with your own tables is to call
                                    the construction function: <code>$().DataTable();</code>.
                                </p> --}}
                                  <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>Effective start date</th>
                                        <th>Effective end date</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th>Office place assignment</th>
                                        <th>Work contract person</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($applicantProfile->contracts as $applicantProfile->contract)
                                    <tr>
                                        <!-- <td>{{ $applicantProfile->contract->id }}</td> -->
                                        <td>{{ $applicantProfile->contract->effective_start_date }}</td>
                                        <td>{{ $applicantProfile->contract->effective_end_date }}</td>
                                        <td>{{ $applicantProfile->contract->diff_days }}</td>
                                        <td>{{ $applicantProfile->contract->status }}</td>
                                        <td>{{ $applicantProfile->contract->office_place_assignment }}</td>
                                        <td>{{ $applicantProfile->contract->work_contract_person }}</td>
                                        <td><a  class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $applicantProfile->contract->id }}">VIEW</a></div></td>
                                        <div class="modal" id="myModal-{{ $applicantProfile->contract->id }}">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title secondary">Resignation</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>
                                                  <form action="{{ route('contract.resigned' ,$applicantProfile->contract->id) }}" method="POST" enctype="multipart/form-data">
                                                      @method('PATCH')
                                                      @csrf
                                                      <div class="modal-body">
                                                          <div class="mb-3">
                                                              <div class="mb-4">
                                                                  <label class="form-label">Contract No.</label>
                                                                  <input type="text" value="{{ $applicantProfile->contract->id }}" class="form-control" readonly>
                                                              </div>
                                                              <div class="mb-4">
                                                                <label class="form-label"><b>Date of resignation:</b></label>
                                                                <input type="date" class="form-control" id="resignation_date" name="resignation_date"  required>
                                                            </div>
                                                          </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                              <button type="submit" class="btn btn-warning">Resigned</button>
                                                          </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                        
                                    </tr>
                                    @endforeach
                                    </tr> 
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
</div>
<script>

$(document).ready(function() {
  // Event listener for changes in the primary select inside any modal with class 'modal'
  $(document).on('change', '.modal #effective_start_date', function() {

    // var effective_start_date = $(this).val();
    // console.log(effective_start_date);

    var effective_start_date = $(this).closest('.modal').find('#effective_start_date').val();
    var effective_end_date = $(this).closest('.modal').find('#effective_end_date').val();
    // console.log(effective_start_date, effective_end_date);

     var daysDifference = calculateDays(effective_start_date, effective_end_date);
    //  var converted = convertDaysToMonthsAndDays(daysDifference);

    console.log(daysDifference);
    // console.log(converted.months + " months and " + converted.days + " days");
    $(this).closest('.modal').find('#diff_days').val(daysDifference);
    // $(this).closest('.modal').find('#total_days_output').html(converted.months + " months and " + converted.days + " days");
    $(this).closest('.modal').find('#total_days_output').html(daysDifference + " days");

    function calculateDays(startDate, endDate) {
            var startDate = new Date(startDate);
            var endDate = new Date(endDate);
            console.log(startDate, endDate);

            // Calculate the time difference in milliseconds
            var timeDifference = endDate - startDate;

            // Convert the time difference to days
            var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            var daysDifference2 = daysDifference + 1;
            console.log(daysDifference2);
            // document.getElementById("result").innerHTML = "Days between dates: " + daysDifference;
            // total_days.val(daysDifference2);
            return daysDifference2;
        }
        function convertDaysToMonthsAndDays(totalDays) {
        var months = Math.floor(totalDays / 30);
        var days = totalDays % 30;

              return {
                  months: months,
                  days: days
              };
        }


  });

  $(document).on('change', '.modal #effective_end_date', function() {

// var effective_start_date = $(this).val();
// console.log(effective_start_date);

var effective_start_date = $(this).closest('.modal').find('#effective_start_date').val();
var effective_end_date = $(this).closest('.modal').find('#effective_end_date').val();
// console.log(effective_start_date, effective_end_date);

var daysDifference = calculateDays(effective_start_date, effective_end_date);
    //  var converted = convertDaysToMonthsAndDays(daysDifference);

    console.log(daysDifference);
    // console.log(converted.months + " months and " + converted.days + " days");
    $(this).closest('.modal').find('#diff_days').val(daysDifference);
    // $(this).closest('.modal').find('#total_days_output').html(converted.months + " months and " + converted.days + " days");
    $(this).closest('.modal').find('#total_days_output').html(daysDifference + " days");

function calculateDays(startDate, endDate) {
        var startDate = new Date(startDate);
        var endDate = new Date(endDate);
        console.log(startDate, endDate);

        // Calculate the time difference in milliseconds
        var timeDifference = endDate - startDate;

        // Convert the time difference to days
        var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        var daysDifference2 = daysDifference + 1;
        console.log(daysDifference2);
        // document.getElementById("result").innerHTML = "Days between dates: " + daysDifference;
        // total_days.val(daysDifference2);
        return daysDifference2;
    }

    function convertDaysToMonthsAndDays(totalDays) {
        var months = Math.floor(totalDays / 30);
        var days = totalDays % 30;

              return {
                  months: months,
                  days: days
              };
        }
});

  
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
@endsection
