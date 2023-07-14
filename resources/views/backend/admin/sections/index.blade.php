@extends('layouts.app')
@section('title' , 'SRESMIS | Sections')
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
                        <span class="font-light text-white float-end">
                            <a href="" class="btn btn-light rounded-0" data-bs-toggle="modal" data-bs-target="#add-section">+ Add Section</a>
                            @include('backend.admin.sections.add-section')
                        </span>
                      </div>
                </div>    
            </div>    
            @foreach ($sections as $section)
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-view-dashboard"></i>
                    </h1>
                    <h6 class="text-white">{{$section->sectionName.' - '.$section->gradeLevelName}}</h6>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        
        </div>
@endsection
