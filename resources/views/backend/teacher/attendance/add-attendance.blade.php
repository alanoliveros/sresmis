@extends('layouts.app')
@section('title', 'SRESMIS | Add Attendance')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xlg-12">
                    <div class="card shadow card_attendance">
                        <div class="box bg-cyan">
                            <h4 class="text-white">Pick Dates</h4>
                           <div class="row">
                            <div class="col-8  col-sm-6 col-md-8 mb-1">
                            <input type="date" class="form-control">
                            </div>
                            <div class="col-4  col-sm-4 col-md-2 mb-1">
                            <a href="" class="btn btn-light  fw-bold">Filter</a>
                            </div>
                            <div class="col-12  col-sm-2 col-md-2 mb-1 d-flex justify-content-start  justify-content-md-center">
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <span class="fs-4 fw-bold" style="color:blue;"> <i class="mdi mdi-gender-male" ></i>Male</span>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($students as $key=>$student)
                    @if ($student->gender == 'Male')
                    <div class="col">
                        <div class="card card-inverse card-info h-100"> 
                            @if ($student->image == 'avatar.png')
                            <img src="{{asset('storage/student_img/boy.png') }}" class="card-img-top w-50 p-1 m-auto rounded-pill" alt=""/>
                           @else
                           <img src="{{asset('storage/student_img/'.$student->image) }}" class="card-img-top w-50 p-1 m-auto" alt=""/>
                           @endif
                        <div class="card-header text-center">
                            <span class="fs-5 fw-bold">{{$student->lastname.', '.$student->name.($student->middlename != NULL? ', '.$student->middlename:'')}}</span>
                        </div>
                        <div class="card-body text-center d-flex align-items-end justify-content-center bg-info">
                            <label>
                                <input type="radio" name="status_student_attendance{{$key}}"/>
                                <span>P</span>
                            </label>
                              <br/>
                            <label>
                                <input type="radio" name="status_student_attendance{{$key}}"/>
                                <span>A</span>
                            </label>
                        </div>
                        </div>
                    </div>
                    @endif
                    
                @endforeach
            </div>
            <div class="mt-3">
                <span class="fs-4 fw-bold" style="color:palevioletred"> <i class="mdi mdi-gender-female" ></i>Female</span>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($students as $key=>$student)
                    @if ($student->gender == 'Female')
                    <div class="col">
                        <div class="card card-inverse card-info h-100"> 
                        @if ($student->image == 'avatar.png')
                         <img src="{{asset('storage/student_img/girl.png') }}" class="card-img-top w-50 p-1 m-auto rounded-pill" alt=""/>
                        @else
                        <img src="{{asset('storage/student_img/'.$student->image) }}" class="card-img-top w-50 p-1 m-auto" alt=""/>
                        @endif
                        <div class="card-header text-center">
                            <span class="fs-5 fw-bold">{{$student->lastname.', '.$student->name.($student->middlename != NULL? ', '.$student->middlename:'')}}</span>
                        </div>
                        <div class="card-body text-center d-flex align-items-end justify-content-center" style="background-color: palevioletred">
                            <label>
                                <input type="radio" name="status_student_attendance{{$key}}"/>
                                <span>P</span>
                            </label>
                              <br/>
                            <label>
                                <input type="radio" name="status_student_attendance{{$key}}"/>
                                <span>A</span>
                            </label>
                        </div>
                        </div>
                    </div>
                    @endif
                    
                @endforeach
            </div>
        </div>
@endsection
