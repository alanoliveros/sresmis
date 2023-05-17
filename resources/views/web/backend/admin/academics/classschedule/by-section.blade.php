@extends('web.backend.layouts.app')
@section('title' , 'Schedules')
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
                                {{-- <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#addSection">+ Add @yield('title')</a>
                                 @include('web.backend.admin.academics.section.create')--}}
                            </div>

                            <!-- Table with stripped rows -->

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xlg-12">
                                        <div class="card">
                                            <div class="box bg-dark text-center">
                                                <span class="font-light text-white fs-3">Sections</span>

                                            </div>
                                        </div>
                                    </div>
                                    @if (count($sections) > 0)
                                        @foreach ($sections as $section)
                                            <div class="col-md-6 col-lg-2 col-xlg-3">
                                                <a href="{{url('admin/academic/class-schedule/'.$section->id.'/'.$gradeLevelId)}}">
                                                    <div class="card card-hover">
                                                        <div class="box text-center">
                                                            <h1 class="font-light text-white">
                                                                <i class="mdi mdi-view-dashboard"></i>
                                                            </h1>
                                                            <h6 class="text-black">{{$section->sectionName}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-6 col-lg-12 col-xlg-3 text-center">
                                            <span class=" text-danger">No section found</span>
                                        </div>
                                    @endif
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


