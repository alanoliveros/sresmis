@extends('web.backend.layouts.app')
@section('title', 'Teacher | Advisory')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Advisory</h5>
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
                            <div class="row my-3 ">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_advisory" required
                                            aria-label="select example">
                                            <option selected disabled>Select Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->id }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    {{-- <a class="float-md-end btn btn-light border-dark rounded-0" data-bs-toggle="modal"
                                        data-bs-target="#addStudent">+ Add Student
                                    </a>
                                    @include('web.backend.teacher.students.admission-advisory.add-student') --}}
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <button type="button"
                                            class="btn btn-secondary rounded-0 filter_student">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div class="student_data">

                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        let optionSelected = 0;



        async function load_student_by_year(year) {
            await $.ajax({
                type: "POST",
                url: "/sresmis/teacher/student-advisory-by-school-year",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "year": year,
                },
                success: function(response) {
                    // console.log(response.students);

                    let tbody = "";



                    $.each(response.students, function(key, student) {

                        tbody +=
                            `<tr>
                                        <td>${student.name}</td>
                                        <td>${student.name}</td>
                                        <td>${student.name}</td>
                                        <td>${student.name}</td>
                                        <td>${student.name}</td>
                                        <td>${student.name}</td>
                                     
                        </tr>`
                    });

                   $('.student_data').html(`<table class="table table-striped table-hover" id="table_head">
                                <thead>
                                    <tr class="fs-5">
                                        <th scope="col" class="text-success">#</th>
                                        <th scope="col" class="text-success">LRN</th>
                                        <th scope="col" class="text-success">Complete name</th>
                                        <th scope="col" class="text-success">Age</th>
                                        <th scope="col" class="text-success">Birthdate</th>
                                        <th scope="col" class="text-success">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="student_data">
                                    ${tbody}
                                </tbody>
                            </table>`);
                    $('#table_head').DataTable();
                


                    
                }
            });
        }
        $(document).ready(function(e) {
            $('.school_year_by_advisory').on('change', function() {
                optionSelected = $(".school_year_by_advisory option:selected").val();
            });
            $('.filter_student').on('click', function(e) {
                e.preventDefault();
                load_student_by_year(optionSelected);
            });
        });
    </script>
@endsection
