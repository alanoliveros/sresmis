@extends('layouts.app')
@section('title', 'SRESMIS | GRADES')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    {{-- <h4 class="page-title">Grades</h4> --}}
                    <div class="ms-auto text-end">
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-12 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan">
                           <div class="row">
                            {{-- first Col --}}
                            <div class="col-8">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-view-dashboard"></i>
                                </h1>
                                <h6 class="text-white">Dashboard</h6>
                            </div>
                             {{-- end first Col --}}

                             {{-- second Col --}}
                            <div class="col-4 d-flex align-items-center justify-content-center grading_level">
                               <span class="text-light bg-dark border border-warning px-2 fs-4">1st Grading</span>
                               <span class="text-light bg-dark border border-warning px-2 fs-4">1st Grading</span>
                               <span class="text-light bg-dark border border-warning px-2 fs-4">1st Grading</span>
                               <span class="text-light bg-dark border border-warning px-2 fs-4">1st Grading</span>
                            </div>
                            {{-- end second Col --}}
                           </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
@endsection
