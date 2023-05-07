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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li> <i
                                class="bi bi-chevron-compact-right"></i>
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
                                <div class="col-12">
                                    <h5 class="float-md-start">Students Information<span> | By Advisory</span></h5>
                                    <a class="float-md-end btn btn-light border-dark rounded-0"
                                        data-bs-toggle="modal" data-bs-target="#addStudent">+ Add Student
                                    </a>
                                    @include('web.backend.teacher.students.admission-advisory.add-student') 

                                </div>
                            </div>
                            <table class="table table-striped table-hover datatable">

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
                                <tbody>
                                    @foreach ($students as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->lrn }}</td>
                                            <td>{{ $student->lastname . ', ' . $student->name . ($student->middlename != null ? ', ' . $student->middlename : '') . ($student->suffix != null ? ', ' . $student->suffix : '') }}
                                            </td>
                                            <td>{{ $student->age }}</td>

                                            <td>{{ date('F d, Y', strtotime($student->birthdate)) }}</td>
                                            <td>
                                                {{-- <div class="dropdown text-dark" tabindex="1">
                                                    <i class="db2" tabindex="1"></i>
                                                    <a class="dropbtn  "><i class="fs-4 mdi mdi-dots-vertical"></i></a>
                                                    <div class="dropdown-content">
                                                        <a href="#">View</a>
                                                        <a href="#">Edit</a>
                                                        <a href="{{ url('sresmis/teacher/delete-student/' . $student->studentId) }}"
                                                            class="text-danger">Delete</a>
                                                    </div>
                                                </div> --}}
                                                {{-- <nav class="header-nav ms-auto">
                                                    <ul class="d-flex align-items-center">
                                                        <li class="nav-item dropdown">

                                                            <a class="nav-link nav-icon" href="#"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bi bi-bell"></i>
                                                                
                                                            </a><!-- End Notification Icon -->

                                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications    ">
                                                                <li class="notification-item">
                                                                    <i class="bi bi-x-circle text-danger"></i>
                                                                    <div>
                                                                        <h4>Atque rerum nesciunt</h4>
                                                                        <p>Quae dolorem earum veritatis oditseno</p>
                                                                        <p>1 hr. ago</p>
                                                                    </div>
                                                                </li>

                                                            </ul><!-- End Notification Dropdown Items -->

                                                        </li><!-- End Notification Nav -->
                                                    </ul>
                                                </nav> --}}
                                                <!-- Default dropright button -->
                                                <div class="dropdown dropend">
                                                    <button class="btn btn-light border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a class="dropdown-item" href="#">View</a></li>
                                                      <li><a class="dropdown-item text-primary" href="#">Edit</a></li>
                                                      <li><a class="dropdown-item text-danger" href="{{ url('sresmis/teacher/delete-student/' . $student->studentId) }}">Delete</a></li>
                                                    </ul>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>

    </main>
@endsection
