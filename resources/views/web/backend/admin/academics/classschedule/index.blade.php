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


                            <div class="container-fluid">
                                <div class="row">
                                    @foreach ($gradelevel as $level)
                                        <div class="pt-3 col-md-6 col-lg-3 col-xlg-3">
                                            <a href="{{url('admin/academic/class-schedule/'.str_replace(' ', '-', $level->gradeLevelName))}}">
                                                <div class="card card-hover">
                                                    <div class="box bg-cyan text-center">
                                                        <h1 class="{{--font-light text-white--}}">
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


