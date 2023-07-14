@extends('layouts.app')
@section('title' , 'SRESMIS | Schedules')
@section('content')
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
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
                        <span class="font-light text-white fs-3">Sections</span>
                        
                      </div>
                </div>    
            </div>    
            @if (count($sections) > 0)
              @foreach ($sections as $section)
              <div class="col-md-6 col-lg-2 col-xlg-3">
                  <a href="{{url('sresmis/admin/schedules/view-by-section/'.$section->id.'/'.$gradeLevelId)}}">
                      <div class="card card-hover">
                      <div class="box bg-success text-center">
                          <h1 class="font-light text-white">
                          <i class="mdi mdi-view-dashboard"></i>
                          </h1>
                          <h6 class="text-white">{{$section->sectionName}}</h6>
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
@endsection
