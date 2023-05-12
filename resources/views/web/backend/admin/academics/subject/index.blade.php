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

                            <div class="card-title" style="text-align: center">
                                <span class="fs-4">@yield('title')</span>
                                <p class="">Select grade level to add subject</p>
                                {{--<a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addSection">+ Add @yield('title')</a>--}}
                                {{--@include('web.backend.admin.academics.section.create')--}}
                            </div>

                            <!-- Table with stripped rows -->

                            <div class="container-fluid">
                                <div class="row">
                                    <hr class="mb-5">

                                    @foreach ($gradelevel as $level)
                                        <div class="col col-lg-4 col-md-12">
                                                <a href="{{ route('admin.show.subject', ['gradeLevelName' => str_replace(' ', '-', $level->gradeLevelName), 'id' => $level->id]) }}">

                                                <div class="card card-hover">
                                                    <div class="box bg-cyan text-center">
                                                        <h1 class="font-light text-white">
                                                            <i class="mdi mdi-view-dashboard"></i>
                                                        </h1>
                                                        <h6 class="text-black">{{$level->gradeLevelName}}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>

