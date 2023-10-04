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
    td:nth-child(1) {
    width: 150px;
    }
    td:nth-child(2) {  
    width: 230px; 
    }
    td:nth-child(3) {
    width: 80px;
    }
    td:nth-child(4) {
    width: 350px;
    }
    td:nth-child(5) {
    width: 60px;
    }
    td:nth-child(5) {
    width: 60px;
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

                                <h4 class="card-title">List of GIP Applicants</h4>
                                <p class="card-title-desc">
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>NAME</th>
                                        <th>GENDER</th>
                                        <th>RESIDENTIAL ADDRESS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($applicantLists as $applicantList)
                                    <tr>
                                        <td>{{ strtoupper($applicantList->applicant_code)}}</td>
                                        <td>{{ Str::ucfirst(strtolower($applicantList->applicant_first_name))  }} {{ strtoupper(substr($applicantList->applicant_middle_name,0,1)) }}. {{ Str::ucfirst(strtolower($applicantList->applicant_last_name)) }}</td>
                                        <td>{{ Str::ucfirst($applicantList->gender) }}</td>
                                        <td>{{ $applicantList->residential_address }}</td>
                                        <td><a href="{{ route('applicant.show',$applicantList->id ) }}" class="btn btn-info">VIEW</a></td>
                                    </tr>
                                    @endforeach
                                    </tr> 
                                    </tbody>
                                </table>
                            </div>  

                            </div> 
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

</div>
<script>

$(document).ready(function() {
  // Event listener for changes in the primary select inside any modal with class 'modal'
  $(document).on('change', '.modal #primary-select', function() {
    var selectedValue = $(this).val();
    var secondarySelectContainer = $(this).closest('.modal').find('#secondary-select-container');
    var mySelect2 = $(this).closest('.modal').find('#mySelect');
    if (selectedValue === "rejected") {
      secondarySelectContainer.hide();
      mySelect2.prop('disabled', true);
    } else if (selectedValue === "incoming") {
      secondarySelectContainer.show();
      mySelect2.prop('disabled', false);
    }
  });
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
@endsection
