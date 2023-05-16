@extends('web.backend.layouts.app')
@section('title', 'Teacher | SF1')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> @yield('title')</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Advisory</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3">
                                        <select class="form-select school_year" required aria-label="select example"
                                            name="school_year">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 filter_Sy">Filter</button>
                                    </div>
                                </div>
                                {{-- add student start --}}
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="mb-3 addstudent-button">
                                    </div>
                                </div>
                                {{-- add student start --}}
                                <hr>

                                <div class="here">
                                    <div class="modal fade" id="studentModal" tabindex="-1"
                                        aria-labelledby="studentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentModalLabel">Student Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="studentData"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 displaystudent-data">
                                        <div class="mb-1">

                                            <a class="btn btn-primary rounded-0" data-bs-toggle="modal"
                                                data-bs-target="#importsf1">Import</a>
                                            @include('web.backend.teacher.school-forms.sf1.import')


                                            <div class="dropdown">
                                                <button class="btn btn-warning rounded-0 fw-bold" data-bs-toggle="dropdown"
                                                    type="button" aria-expanded="false">
                                                    Export
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item exportToExcel"
                                                            href="{{ url('teacher/export-sf1-by-school_year') }}">Excel</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('teacher/generate') }}">PDF</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <table class="table table-hover" id="studentSF1">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>LRN</th>
                                                    <th>Student Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Birthdate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sf1data as $key => $val)
                                                    <tr>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $key + 1 }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $val->lrn }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $val->name }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $val->gender }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $val->age }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">{{ $val->birthdate }}
                                                        </td>
                                                        <td data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="">
                                                            <div class="btn-group dropend">
                                                                <button
                                                                    class="btn btn-sm btn-light border-dark rounded-pill fw-bold "
                                                                    data-bs-toggle="dropdown" type="button"
                                                                    aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li class="student-cell"><a class="dropdown-item "
                                                                            href="#">view</a></li>
                                                                    <li><a class="dropdown-item text-primary"
                                                                            href="#">Edit</a></li>
                                                                    <li><a class="dropdown-item text-danger"
                                                                            id="deleteStudent"
                                                                            href="{{ url('teacher/student-delete/' . $val->studentId) }}">Delete</a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="students_table">

                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.student-cell').hover(
                function() {
                    // Get the student data from the corresponding row
                    var lrn = $(this).closest('tr').find('td:eq(1)').text();
                    var name = $(this).closest('tr').find('td:eq(2)').text();
                    var gender = $(this).closest('tr').find('td:eq(3)').text();
                    var age = $(this).closest('tr').find('td:eq(4)').text();
                    var birthdate = $(this).closest('tr').find('td:eq(5)').text();

                    // Create the student data HTML
                    var studentData = '<strong>LRN:</strong> ' + lrn + '<br>' +
                        '<strong>Name:</strong> ' + name + '<br>' +
                        '<strong>Gender:</strong> ' + gender + '<br>' +
                        '<strong>Age:</strong> ' + age + '<br>' +
                        '<strong>Birthdate:</strong> ' + birthdate;

                    // Set the student data in the modal body
                    $('#studentData').html(studentData);

                    // Show the modal
                    $('#studentModal').modal('show');

                  
                },
                function() {
                    // Hide the modal on hover out
                    $('#studentModal').modal('hide');
                }
            );
        });
    </script> --}}
    @include('web.backend.teacher.school-forms.sf1.script')
@endsection
