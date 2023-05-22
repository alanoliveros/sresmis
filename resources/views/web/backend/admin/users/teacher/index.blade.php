@extends('web.backend.layouts.app')
@section('title' , 'Teacher')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-secondary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addTeacher">+ Add @yield('title')</a>
                                @include('web.backend.admin.users.teacher.create')
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table" id="components-datatable">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Grade Level Taught</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Section Advisory</th>
                                    <th scope="col">Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $key=>$teacher)
                                    <tr>
                                        <td>{{$teacher->lastname.', '.$teacher->name.', '.($teacher->middlename == NULL? '':$teacher->middlename).($teacher->suffix == NULL? '':', '.$teacher->suffix)}}</td>
                                        <td>{{$teacher->designation}}</td>
                                        <td>{{$teacher->gradeLevelName}}</td>
                                        <td>{{$teacher->position}}</td>
                                        <td>{{$teacher->sectionName}}</td>
                                        <td style="padding-bottom: 0; padding-top: 0;">
                                            <div class="btn-group">
                                                <a type="button" data-bs-toggle="dropdown" data-bs-auto-close="true"
                                                   aria-expanded="false" href="">
                                                    <i class="bi bi-three-dots" style="font-size: 26px;"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i> Show</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>

