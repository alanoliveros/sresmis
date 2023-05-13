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
                                       data-bs-target="#addSubject">+ Add @yield('title')</a>
                                    @include('web.backend.admin.academics.subject.create')
                                </div>

                                <!-- Table with stripped rows -->

                                <table class="table" id="components-datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Written Work</th>
                                        <th scope="col">Performance Task</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $key=>$subject)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $subject->subjectName }}</td>
                                            <td>{{ $subject->description }}</td>
                                            <td>{{ $subject->written_work_percentage }}</td>
                                            <td>{{ $subject->performance_tasks_percentage }}</td>
                                            <td>
                                                <a href=""><i class="bi bi-eye-fill"></i></a>
                                                <a href=""><i class="bi bi-pencil-square"></i></a>
                                                <a href=""><i class="bi bi-trash"></i></a>
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
