@extends('layouts.app')

@section('content')

<div class="">
                    <div>
                        <div>
                            <div class="container-fluid">
                                <div class="">
                                    <div class="account-pagesz">
                                        <div class="account-boxes">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="py-3 text-center">
                                                        <h2><b>GOVERNMENT INTERNSHIP PROGRAM(GIP)</b></h2>
                                                    </div>
                                                    <hr>
                                                    <div class="col-lg-12">
                                                        <form action="" name="cart" method="POST" class="needs-validation" id="thisform" enctype="multipart/form-data">
                                                            @csrf
                                                            {{-- @if ($message = Session::get('success'))
                                                            <div class="alert alert-success">
                                                                <p>{{ $message }}</p>
                                                            </div>
                                                            @endif --}}

                                                           
                                                            <br>  
                                                            <div class="row">
                                                                <label for="firstName"><b>NAME OF APPLICANTS</b></label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="" name="applicant_first_name" placeholder="First name" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Name cannot be blank.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="" name="applicant_middle_name" placeholder="Middle name" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Name cannot be blank.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="" name="applicant_last_name" placeholder="Last name" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Name cannot be blank.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <label for="firstName"><b>PROFILE PICTURE</b></label>
                                                                    <input type="file" class="form-control" id="" name="profile_picture" value="" required accept="image/*">
                                                                    <div class="invalid-feedback">
                                                                        Street Address cannot be blank.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <label for="firstName"><b>RESIDENTIAL ADDRESS</b></label>
                                                                    <input type="text" class="form-control" id="" name="residential_address" placeholder="ex. Brgy. 84, Rainbow Village, Manlurip, San jose St" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Street Address cannot be blank.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="firstName"><b>Telephone No.</b></label>
                                                                    <input type="text" class="form-control" name="telephone_number" id="" placeholder="ex. xxx-xxx-xxx" value="">
                                                                    <div class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="firstName"><b>Mobile Number </b></label>
                                                                    <input type="text" class="form-control" id="" name="mobile_number" placeholder="ex. 0915xxxxxxx or 858-xxxx" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Contact Number cannot be blank.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label for="firstName"><b>Email Address</b></label>
                                                                        <input type="email" class="form-control" name="email" placeholder="ex. joey.cabelin.1@gmail.com" id="" value="">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <label for="firstName"><b>PLACE OF BIRTH (city/province)</b></label>
                                                                    <input type="text" class="form-control" id="" name="place_of_birth" placeholder="ex. Tacloban City, leyte" value="" required>
                                                                    <div class="invalid-feedback">
                                                                        Street Address cannot be blank.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="firstName"><b>DATE OF BIRTH (mm/dd/yyyy)</b></label>
                                                                    <input type="date" class="form-control" id="" name="date_of_birth"  required>
                                                                    <div class="invalid-feedback">
                                                                        Street Address cannot be blank.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                           <label for="firstName"><b>GENDER</b></label>
                                                           <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="male" checked value="male">
                                                            <label class="form-check-label" for="male">
                                                              Male
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                                            <label class="form-check-label" for="female">
                                                              Female
                                                            </label>
                                                          </div>
                                                          <br>
                                                          <label for="firstName"><b>CIVIL STATUS</b></label>
                                                           <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="civil_status" id="single" checked value="single">
                                                            <label class="form-check-label" for="single">
                                                              Single
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="civil_status" id="married" value="married">
                                                            <label class="form-check-label" for="married">
                                                            Married
                                                            </label>
                                                          </div>
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="civil_status" id="widow_widower" value="widow_widower">
                                                            <label class="form-check-label" for="widow-widower">
                                                              Widow/Widower
                                                            </label>
                                                          </div>
                                                          <br>
                                                          <br>
                                                            <div class="col-md-12">
                                                                    

                                                                <button type="submit" class="btn btn-primary"
                                                                    id="submit">
                                                                    SUBMIT
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
</div>
@endsection
