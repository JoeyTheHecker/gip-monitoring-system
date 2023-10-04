@extends('layouts.app')

@section('content')
     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-16 mb-2">GIP Applicants</p>
                                                <h4 class="mb-2">{{ $totalApplicants }}</h4>   
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-secondary rounded-3">
                                                <i class="ri-user-3-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-16 mb-2">Male</p>
                                                <h4 class="mb-2">{{ $totalMale }}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-info rounded-3">
                                                <i class="ri-user-3-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-16 mb-2">Female</p>
                                                <h4 class="mb-2">{{ $totalFemale }}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-danger rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <!-- <div id="piechart" style="width: 900px; height: 500px; margin: auto;"></div>
                        <br> -->

                       <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Served their almost one-year term</h4>
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
                                @foreach ($yearApplicants as $yearApplicant)
                                <tr>
                                    <td>{{ strtoupper($yearApplicant->applicant_code)}}</td>
                                    <td>{{ Str::ucfirst(strtolower($yearApplicant->applicant_first_name))  }} {{ strtoupper(substr($yearApplicant->applicant_middle_name,0,1)) }}. {{ Str::ucfirst(strtolower($yearApplicant->applicant_last_name)) }}</td>
                                    <td>{{ Str::ucfirst($yearApplicant->gender) }}</td>
                                    <td>{{ $yearApplicant->residential_address }}</td>
                                    <td><a href="{{ route('applicant.show',$yearApplicant->id ) }}" class="btn btn-info">VIEW</a></td>
                                </tr>
                                @endforeach
                                </tr> 
                                </tbody>
                            </table>
                        </div>
                       </div>
                </div>
                
                <!-- End Page-content -->

             
                </script>
@endsection
