@extends('web.backend.layouts.app')
@section('title' , 'Subject')
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
                                   data-bs-target="#addSection">+ Add @yield('title')</a>
                                {{--@include('admin.create-subjects')--}}
                            </div>

                            <!-- Table with stripped rows -->

                            <table class="table table-hover" id="subjects">
                                <thead>
                                <tr class="fs-5">
                                    <th>Subject Name</th>
                                    <th>Subject Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{$subject->subjectName}}</td>
                                        <td>{{$subject->description}}</td>
                                        <td>
                                            <div class="dropdown" tabindex="1">
                                                <i class="db2" tabindex="1"></i>
                                                <a class="dropbtn"><i class=" fs-4 mdi mdi-dots-vertical text-dark"></i></a>
                                                <div class="dropdown-content">
                                                    <a href="#">View</a>
                                                    <a href="#">Edit</a>
                                                    <a href="#" class="text-danger">Delete</a>
                                                </div>
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

