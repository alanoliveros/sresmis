@extends('layouts.app')
@section('title', 'SRESMIS | GRADES')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    {{-- <h4 class="page-title">Grades</h4> --}}
                    {{-- <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grades
                                </li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Grades</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item quarterGrading text-primary" data-quarter="1">1st Grading</li>
                                <li class="breadcrumb-item quarterGrading" data-quarter="2">2nd Grading</li>
                                <li class="breadcrumb-item quarterGrading" data-quarter="3">3rd Grading</li>
                                <li class="breadcrumb-item quarterGrading" data-quarter="4">4th Grading</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-12">
                    <div class="card">
                        <div class="box bg-cyan">
                            <form action="{{route('sresmis.teacher.grades.filter')}}">
                                @csrf
                                <div class="row">
                                    {{-- first Col --}}
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class="fs-5"><i class="mdi mdi-book-multiple "></i>&nbsp;Section / Grade Level</span>
                                                <div class="text-warning"><span class="mx-2">{{$sectionName->sectionName}}</span> | <span class="mx-2"><i>{{$sectionName->gradeLevelName}}</i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class="fs-5"><i class="mdi mdi-book-multiple "></i>&nbsp;Subject / School Year</span>
                                                <div class="text-warning"><span class="mx-2">{{$subjectselect->subjectName}}</span> | <span class="mx-2"><i>{{$yearselect->school_year}}</i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class="fs-5"><i class="mdi mdi-book-multiple "></i>&nbsp;Grade Status</span>
                                                <div class="text-warning"><span class="mx-2"> Posted </span> | <span class="mx-2"><i> Date Posted </i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex align-items-end">
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
@endsection
@section('scripts')

@endsection

