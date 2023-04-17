@extends('layouts.app')
@section('title', 'SRESMIS | Advisory')
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
                                    Advisory
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                     
                      <div class="row">
                        <div class="mb-2">
                            <span class="fs-3 fw-bold">{{$section->gradeLevelName.' - '.$section->sectionName}}</span>
                            <a href="" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addStudent">+ Add student</a>
                            @include('backend.teacher.student-information.add-student')
                        </div>
                        <!-- column -->
                        <table id="studentsLists" class="table table-dark table-hover">
                            <thead>
                                <tr class="fs-5">
                                  <th scope="col" class="text-success">#</th>
                                  <th scope="col" class="text-success">LRN</th>
                                  <th scope="col" class="text-success">Complete name</th>
                                  <th scope="col" class="text-success">Age</th>
                                  <th scope="col" class="text-success">Birthdate</th>
                                  <th scope="col" class="text-success">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $key=>$student)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$student->lrn}}</td>
                                    <td>{{$student->lastname.', '.$student->name. ($student->middlename != NULL? ', '.$student->middlename : ''). ($student->suffix != NULL? ', '.$student->suffix : '') }}</td>
                                    <td>{{$student->age}}</td>

                                    <td>{{date('F d, Y', strtotime($student->birthdate))}}</td>
                                    <td>
                                        <div class="dropdown" tabindex="1">
                                            <i class="db2" tabindex="1"></i>
                                            <a class="dropbtn"><i class=" fs-4 mdi mdi-dots-vertical"></i></a>
                                             <div class="dropdown-content">
                                                <a href="#">View</a>
                                                <a href="#">Edit</a>
                                                <a href="{{url('sresmis/teacher/delete-student/'.$student->studentId)}}" class="text-danger">Delete</a>
                                             </div>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>

                                 
                           
                              
                        </table>
                        <!-- column -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
@endsection
