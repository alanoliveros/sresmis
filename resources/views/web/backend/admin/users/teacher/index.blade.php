@extends('web.backend.layouts.app')
@section('title' , 'Teacher')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addTeacher">+ Add @yield('title')</a>
                                @include('web.backend.admin.users.teacher.create')
                            </div>
                            {{--<p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to convert to a datatable</p>--}}

                            <!-- Table with stripped rows -->
                            <table class="table" id="components-datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Grade Level Taught</th>
                                    <th scope="col">Section Assigned</th>
                                    <th scope="col">Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $key=>$teacher)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$teacher->lastname.', '.$teacher->name.', '.($teacher->middlename == NULL? '':$teacher->middlename.', ').($teacher->suffix == NULL? '':$teacher->suffix.'.')}}</td>
                                        <td>{{$teacher->designation}}</td>
                                        <td>{{$teacher->gradeLevelName}}</td>
                                        <td>{{$teacher->section_name}}</td>
                                        <td>
                                            <a href="" class="bi bi-eye" style="margin-right: 6px"></a>
                                            <a href="" class="bi bi-pencil-square" style="margin-right: 6px"></a>
                                            <a href="" class="bi bi-trash"></a>
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

