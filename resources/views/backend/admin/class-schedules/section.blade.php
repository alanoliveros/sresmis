@extends('layouts.app')
@section('title' , 'SRESMIS | Schedules')
@section('content')
<div class="page-wrapper">
     
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-xlg-12">
                <div class="card">
                    <div class="box bg-dark ">
                        <span class="font-light text-white fs-3">{{$section->sectionName. ' - Subjects'}}</span>
                        {{-- <span class="font-light text-white fs-3"><a href="" class="float-end rounded-0 btn btn-light" data-bs-toggle="modal" data-bs-target="#add-schedule">+ Add Schedule</a>
                        @include('backend.admin.class-schedules.add-schedule')
                        </span> --}}
                      </div>
                </div>    
            </div>

            
            @foreach ($subjects as $subject)
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{url('sresmis/admin/schedule-by-subject')}}" data-bs-toggle="modal" data-bs-target="#add-schedule{{$subject->id}}">
                    <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                        <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">{{$subject->subjectName}}</h6>
                    </div>
                    </div>
                </a>
                @include('backend.admin.class-schedules.add-schedule')
            </div>
            
            @endforeach


          <div class="row">
            <div class="col-md-12 col-lg-12 col-xlg-12">
                <div class="card">
                        <div class="box bg-light">
                            
                                <table class="table table-hover" id="subjects">
                                    <thead>
                                            <tr class="fs-5">
                                                <th></th>
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
                                        @foreach ($classSchedule as $sched)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
@endsection
