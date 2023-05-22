@extends('web.backend.layouts.app')
@section('title' , 'Schedules')
@section('content')
    <main id="main" class="main">


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">

                            <div class="card-title">
                                <span class="fs-4">Class Schedules</span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">

                            <!-- Table with stripped rows -->

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xlg-12">
                                        <div class="card">

                                            <div class="box bg-white text-center">
                                                <span class="fs-3">Sections</span>

                                            </div>
                                        </div>
                                    </div>
                                    @if (count($sections) > 0)
                                        @foreach ($sections as $section)
                                            <div class="col-md-6 col-lg-3 col-xlg-3">
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


