@extends('layouts.app')
@section('title' , 'SRESMIS | Manage Subjects')
@section('content')
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">

              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Manage Subjects
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
                        <span class="font-light text-white fs-3">Subjects</span>

                      </div>
                </div>
            </div>
            @foreach ($gradelevel as $level)
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{url('sresmis/admin/'.str_replace(' ', '-',$level->gradeLevelName).'/'.$level->id)}}">
                <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-view-dashboard"></i>
                    </h1>
                    <h6 class="text-white">{{$level->gradeLevelName}}</h6>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
@endsection
