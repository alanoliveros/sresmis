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
                                <span class="fs-4">{{$section->sectionName. ' - Subjects'}}</span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">
                                {{-- <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#addSection">+ Add @yield('title')</a>
                                 @include('web.backend.admin.academics.section.create')--}}
                            </div>

                            <!-- Table with stripped rows -->

                            <div class="container-fluid">
                                <div class="row">
                                    @foreach ($subjects as $subject)
                                        <div class="col-md-6 col-lg-3 col-xlg-3 ">
                                            <a href="{{url('admin/schedule-by-subject')}}" data-bs-toggle="modal" data-bs-target="#add-schedule{{$subject->id}}">
                                                <div class="card card-hover">
                                                    <div class="box bg-cyan text-center">
                                                        <h1 class="font-light text-white">
                                                            <i class="mdi mdi-view-dashboard"></i>
                                                        </h1>
                                                        <h6 class="text-black">{{$subject->subjectName}}</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            @include('web.backend.admin.academics.classschedule.add-schedule')
                                        </div>

                                    @endforeach


                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xlg-12">
                                            <div class="card">
                                                <div class="box bg-light">

                                                    <table class="table table-hover" id="subjects">
                                                        <thead>
                                                        <tr class="fs-5">
                                                            <th class="bg-primary border border-dark text-light">Monday</th>
                                                            <th class="bg-primary border border-dark text-light">Tuesday</th>
                                                            <th class="bg-primary border border-dark text-light">Wednesday</th>
                                                            <th class="bg-primary border border-dark text-light">Thursday</th>
                                                            <th class="bg-primary border border-dark text-light">Friday</th>
                                                            <th class="bg-primary border border-dark text-light">Saturday</th>
                                                            <th class="bg-primary border border-dark text-light">Sunday</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($schedules as $sched)
                                                            @php
                                                                $arr =   explode (",", $sched->scheduleDay);

                                                            @endphp
                                                            <tr class="text-center">
                                                                <td class="bg-warning">{{$sched->startTime.' - '.date('h:i:s a', strtotime($sched->endTime))}}</td>
                                                                <td>{{in_array("Monday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Tuesday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Wednesday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Thursday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Friday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Saturday", $arr)? $sched->subjectName:'----'}}</td>
                                                                <td>{{in_array("Sunday", $arr)? $sched->subjectName:'----'}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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


