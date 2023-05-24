@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
@section('content')
    <style>
        table.student-table input {
            width: 100%;
            text-align: right;
            border: none;
            background: transparent;
            padding: 6px;
            overflow: hidden;

        }

        table thead {
            background-color: blanchedalmond;
        }
    </style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><i class="bi bi-building-fill-check"></i> @yield('title')</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option value="">Select School Year</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->school_year }}">{{ $session->school_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select student_select" name="student_select" id="">
                                            <option value="">Select Student</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col gx-0">
                                    <div class="mb-3 p-2 float-md-end">
                                        <button type="button" class="btn btn-primary rounded-0 btnSaveCard">Save</button>
                                    </div>
                                </div>
                                <div class="col gx-0">
                                    <div class="dropdown">
                                        <button class="btn btn-warning rounded-0" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Print
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{url('teacher/report-card/print-excel')}}">Excel</a></li>
                                            <li><a class="dropdown-item" href="#">PDF</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <!-- Bordered Tabs Justified -->
                                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified"
                                        role="tablist">
                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-home" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Quarterly Grades</button>
                                        </li>
                                        <li class="nav-item flex-fill" role="presentation">
                                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#bordered-justified-profile" type="button" role="tab"
                                                aria-controls="profile" aria-selected="false">Core Values</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                        <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <h5 class="card-title fs-4 text-center">REPORT ON LEARNING PROGRESS AND
                                                ACHIEVEMENT</h5>
                                            <div class="row mb-2">
                                                <div class="col-6 text-start">
                                                    <span class=""><b>Name:</b> <u
                                                            class="studentName fw-bold fs-5"></u></span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span><b>LRN:</b> <u class="studentLRN fw-bold fs-5"></u></span>
                                                </div>
                                            </div>
                                            <div class="table table-responsive mb-3">
                                                <table class="table table-bordered border-dark student-table report_card">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">Learning Areas </th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <th colspan="4">Quarter</th>
                                                            <th rowspan="3">Final Rating</th>
                                                            <th rowspan="3">Remarks</th>
                                                        </tr>
                                                        <tr class="text-center" rowspan="3">
                                                            <th>1</th>
                                                            <th>2</th>
                                                            <th>3</th>
                                                            <th>4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="summary_grade_tbody">
                                                        <tr>
                                                            <td class="text-center text-danger" colspan="7">No Subjects
                                                                found
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="table table-responsive mb-3">
                                                <h5 class="card-title fs-4 text-center">REPORT ON LEARNER’S OBSERVED VALUES
                                                </h5>
                                                <table class="table table-bordered border-dark student-table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">Core Values</th>
                                                            <th rowspan="3">Behavior Statements</th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <th colspan="4">Quarter</th>

                                                        </tr>
                                                        <tr class="text-center" rowspan="3">
                                                            <th>1</th>
                                                            <th>2</th>
                                                            <th>3</th>
                                                            <th>4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="observed_values">

                                                        <tr class="text-start core_values" data-values="makadiyos">
                                                            <td>1. Maka-Diyos</td>
                                                            <td>Expresses one’s spiritual beliefs while respecting the
                                                                spiritual
                                                                beliefs of others
                                                            </td>
                                                            @php
                                                                $options = ['AO', 'SO', 'RO', 'NO'];
                                                            @endphp
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <td>
                                                                    <select data-quarter="{{ $i }}"
                                                                        class="select_core_values"
                                                                        name="makadiyos[{{ $i }}]"
                                                                        class="border border-none w-100" id="">
                                                                        <option value="">Select</option>
                                                                        @foreach ($options as $option)
                                                                            <option value="{{ $option }}">
                                                                                {{ $option }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        <tr class="text-start core_values" data-values="makatao">
                                                            <td>2. Makatao</td>
                                                            <td>Shows adherence to ethical principles by upholding truth
                                                            </td>
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <td>
                                                                    <select data-quarter="{{ $i }}"
                                                                        class="select_core_values"
                                                                        name="makatao[{{ $i }}]"
                                                                        class="border border-none w-100" id="">
                                                                        <option value="">Select</option>
                                                                        @foreach ($options as $option)
                                                                            <option value="{{ $option }}">
                                                                                {{ $option }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        <tr class="text-start core_values" data-values="makakalikasan">
                                                            <td>3. Maka-
                                                                kalikasan
                                                            </td>
                                                            <td>Cares for the environment and utilizes resources wisely,
                                                                judiciously, and economically</td>
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <td>
                                                                    <select data-quarter="{{ $i }}"
                                                                        class="select_core_values"
                                                                        name="makakalikasan[{{ $i }}]"
                                                                        class="border border-none w-100" id="">
                                                                        <option value="">Select</option>
                                                                        @foreach ($options as $option)
                                                                            <option value="{{ $option }}">
                                                                                {{ $option }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        <tr class="text-start core_values" data-values="makabansa_first">
                                                            <td rowspan="2" class="">4. Makabansa</td>
                                                            <td>Demonstrates pride in being a Filipino; exercises the rights
                                                                and
                                                                responsibilities of a Filipino citizen</td>
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <td>
                                                                    <select data-quarter="{{ $i }}"
                                                                        class="select_core_values"
                                                                        name="makabansa_first[{{ $i }}]"
                                                                        class="border border-none w-100" id="">
                                                                        <option value="">Select</option>
                                                                        @foreach ($options as $option)
                                                                            <option value="{{ $option }}">
                                                                                {{ $option }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        <tr class="text-start core_values" data-values="makabansa_second">
                                                            <td>Demonstrates appropriate behavior in carrying out activities
                                                                in the
                                                                school, community, and country</td>
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                <td>
                                                                    <select class="select_core_values"
                                                                        data-quarter="{{ $i }}"
                                                                        name="makabansa_second[]"
                                                                        class="border border-none w-100" id="">
                                                                        <option value="">Select</option>
                                                                        @foreach ($options as $option)
                                                                            <option value="{{ $option }}">
                                                                                {{ $option }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        {{-- <tr>
                                                            <td class="text-center text-danger" colspan="7">No Subjects found
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- End Bordered Tabs Justified -->

                                </div>
                                <hr>
                                <div class="col-12 text-center">
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-start">
                                            <p class="fw-bold fs-5">Descriptors</p>
                                            <span>Outstanding</span>
                                            <span class="d-block">Very Satisfactory</span>
                                            <span class="d-block">Satisfactory</span>
                                            <span class="d-block">Fairly Satisfactory</span>
                                            <span class="d-block">Dis Not Meet Expectations</span>
                                        </div>
                                        <div class="col-12 col-md-2 text-start">
                                            <p class="fw-bold fs-5">Grading Scale</p>
                                            <span>90-100</span>
                                            <span class="d-block">85-89</span>
                                            <span class="d-block">80-84</span>
                                            <span class="d-block">75-79</span>
                                            <span class="d-block text-danger">Below 75</span>
                                        </div>
                                        <div class="col-12 col-md-2 text-start">
                                            <p class="fw-bold fs-5">Remarks</p>
                                            <span>Passed</span>
                                            <span class="d-block">Passed</span>
                                            <span class="d-block">Passed</span>
                                            <span class="d-block">Passed</span>
                                            <span class="d-block text-danger">Failed</span>
                                        </div>
                                        <div class="col-12 col-md-2 text-start">
                                            <p class="fw-bold fs-5">Marking</p>
                                            <span>AO</span>
                                            <span class="d-block">SO</span>
                                            <span class="d-block">RO</span>
                                            <span class="d-block">NO</span>
                                        </div>
                                        <div class="col text-start">
                                            <p class="fw-bold fs-5">Non-numerical Rating</p>
                                            <span>Always Observed</span>
                                            <span class="d-block">Sometimes Observed</span>
                                            <span class="d-block">Rarely Observed</span>
                                            <span class="d-block">Not Observed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.report-card.script')
@endsection
