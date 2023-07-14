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
                        <span class="font-light text-white fs-3">{{$name}}</span>
                        <span class="font-light text-white float-end">
                            <a href="" class="btn btn-light rounded-0" data-bs-toggle="modal" data-bs-target="#add-subjects">+ Add Subject</a>
                            @include('backend.admin.subjects.add-subjects')
                        </span>
                      </div>
                </div>    
            </div>    
            <div class="col-md-12 col-lg-12 col-xlg-12">
              <div class="card">
                      <div class="box bg-light">
                          
                              <table class="table table-hover" id="subjects">
                                  <thead>
                                          <tr class="fs-5">
                                              <th>Subject Name</th>
                                              <th>Subject Description</th>
                                              <th>Action</th>
                                          </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($subjects as $subject)
                                          <tr>
                                              <td>{{$subject->subjectName}}</td>
                                              <td>{{$subject->description}}</td>
                                              <td>
                                                  <div class="dropdown" tabindex="1">
                                                      <i class="db2" tabindex="1"></i>
                                                      <a class="dropbtn"><i class=" fs-4 mdi mdi-dots-vertical text-dark"></i></a>
                                                      <div class="dropdown-content">
                                                          <a href="#">View</a>
                                                          <a href="#">Edit</a>
                                                          <a href="#" class="text-danger">Delete</a>
                                                      </div>
                                                  </div>
                                              </td>
                                            
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                  
                      </div>
              </div>    
            </div>    
           
          </div>
      
        </div>
@endsection
