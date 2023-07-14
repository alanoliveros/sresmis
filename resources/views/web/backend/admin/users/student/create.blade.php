@extends('web.backend.layouts.app')

@section('title', 'Student')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">
                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="{{route('student.create')}}" class="btn btn-secondary float-end">+
                                    Add @yield('title')</a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body mt-3">
                            <div class="row">
                                {{--==================================================================================================--}}
                                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="selectSchoolYear"
                                            aria-label="Select School Year">
                                        <option value="2023-2024">2023-2024</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2017-2018">2017-2018</option>
                                    </select>
                                    <label for="selectSchoolYear">Select School Year</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="gradeLevel" aria-label="Grade Level">
                                        <option value="Grade VI">Grade VI</option>
                                        <option value="Grade V">Grade V</option>
                                        <option value="Grade IV">Grade IV</option>
                                        <option value="Grade III">Grade III</option>
                                        <option value="Grade II">Grade II</option>
                                        <option value="Grade I">Grade I</option>
                                        <option value="Kindergarten">Kindergarten</option>
                                    </select>
                                    <label for="gradeLevel">Grade Level</label>
                                </div>
                                </form>


                                <div class="col px-5 my-5">

                                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="firstName" type="text"
                                                   placeholder="First Name" data-sb-validations="required"/>
                                            <label for="firstName">First Name</label>
                                            <div class="invalid-feedback" data-sb-feedback="firstName:required">First
                                                Name is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="middleName" type="text"
                                                   placeholder="Middle Name" data-sb-validations="required"/>
                                            <label for="middleName">Middle Name</label>
                                            <div class="invalid-feedback" data-sb-feedback="middleName:required">Middle
                                                Name is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="lastName" type="text"
                                                   placeholder="Last Name" data-sb-validations="required"/>
                                            <label for="lastName">Last Name</label>
                                            <div class="invalid-feedback" data-sb-feedback="lastName:required">Last Name
                                                is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="suffix" type="text" placeholder="Suffix"
                                                   data-sb-validations="required"/>
                                            <label for="suffix">Suffix</label>
                                            <div class="invalid-feedback" data-sb-feedback="suffix:required">Suffix is
                                                required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="ethnicGroup" type="text"
                                                   placeholder="Ethnic Group" data-sb-validations="required"/>
                                            <label for="ethnicGroup">Ethnic Group</label>
                                            <div class="invalid-feedback" data-sb-feedback="ethnicGroup:required">Ethnic
                                                Group is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="motherTongue" type="text"
                                                   placeholder="Mother Tongue" data-sb-validations="required"/>
                                            <label for="motherTongue">Mother Tongue</label>
                                            <div class="invalid-feedback" data-sb-feedback="motherTongue:required">
                                                Mother Tongue is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="religion" type="text" placeholder="Religion"
                                                   data-sb-validations="required"/>
                                            <label for="religion">Religion</label>
                                            <div class="invalid-feedback" data-sb-feedback="religion:required">Religion
                                                is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="dateOfBirth" type="text"
                                                   placeholder="Date of Birth" data-sb-validations="required"/>
                                            <label for="dateOfBirth">Date of Birth</label>
                                            <div class="invalid-feedback" data-sb-feedback="dateOfBirth:required">Date
                                                of Birth is required.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="selectGender" aria-label="Select Gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <label for="selectGender">Select Gender</label>
                                        </div>

                                        <div class="d-none" id="submitSuccessMessage">
                                            <div class="text-center mb-3">
                                                <div class="fw-bolder">Form submission successful!</div>
                                                <p>To activate this form, sign up at</p>

                                            </div>
                                        </div>
                                        <div class="d-none" id="submitErrorMessage">
                                            <div class="text-center text-danger mb-3">Error sending message!</div>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg disabled" id="submitButton"
                                                    type="submit">Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col px-5 my-5">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="purok" type="text" placeholder="Purok"
                                               data-sb-validations="required"/>
                                        <label for="purok">Purok</label>
                                        <div class="invalid-feedback" data-sb-feedback="purok:required">Purok is
                                            required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="barangay" type="text" placeholder="Barangay"
                                               data-sb-validations="required"/>
                                        <label for="barangay">Barangay</label>
                                        <div class="invalid-feedback" data-sb-feedback="barangay:required">Barangay
                                            is required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="city" type="text" placeholder="City"
                                               data-sb-validations="required"/>
                                        <label for="city">City</label>
                                        <div class="invalid-feedback" data-sb-feedback="city:required">City is
                                            required.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="province" type="text" placeholder="Province"
                                               data-sb-validations="required"/>
                                        <label for="province">Province</label>
                                        <div class="invalid-feedback" data-sb-feedback="province:required">Province
                                            is required.
                                        </div>
                                    </div>

                                </div>
                                <div class="col px-5 my-5">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="remarks" type="text" placeholder="Remarks"
                                               data-sb-validations="required"/>
                                        <label for="remarks">Remarks</label>
                                        <div class="invalid-feedback" data-sb-feedback="remarks:required">Remarks is
                                            required.
                                        </div>
                                    </div>

                                </div>

                                        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                                        {{--==================================================================================================--}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
        </section>

    </main><!-- End #main -->
@endsection
<x-datatable/>
