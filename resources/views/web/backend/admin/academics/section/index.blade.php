@extends('web.backend.layouts.app')
@section('title' , 'Section')

@section('content')

    @yield('title')


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
                                @include('web.backend.admin.academics.section.create')
                            </div>


                            <!-- Table with stripped rows -->
                            <table class="table" id="sectionstable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Grade Level Name</th>
                                    <th scope="col">Section Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sections as $key=>$section)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$section->gradeLevelName}}</td>
                                    <td>{{$section->section_name}}</td>
                                    <td>EDIT | DELETE</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>
