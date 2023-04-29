@extends('layouts.app')
@section('title', 'SRESMIS | School-Form-1')
@section('content')
    <div class="page-wrapper">
        
        <div class="page-breadcrumb">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title my-2 fs-3">School Form 1</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-dark">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('sresmis.teacher.sf9')}}"> SF9</a>
                                    
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-xlg-12">
                      <div class="card">
                          <div class="box bg-dark ">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xlg-3">
                                        <span class="font-light text-white fs-4">School Year</span>
                                        <select name="schoolYear" class="form-select schoolYear_sf1" id="">
                                                    <option selected required disabled>Select School Year</option>
                                                @foreach ($sessions as $year)
                                                    <option value="{{$year->id}}">{{$year->school_year}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xlg-3 d-flex align-items-end">
                                      <button type="button" class="btn btn-success text-light rounded-0  filter_sf1">Filter</button>
                                    </div>
                                </div>
                            </div>
                      </div>    
                  </div>    
                
                    {{-- <div class="col-md-6 col-lg-3 col-xlg-3 sf1_fetch_data">
                        <a href="">
                            <div class="card">
                            <div class="box bg-warning text-danger text-center">
                              <span class="">No data found</span>
                               
                            </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-12 col-md-6 col-lg-4 col-xlg-3 sf1_fetch_data">
                       
                            <div class="card">
                                <div class="box bg-dark text-light ">
                                                <span class="d-block text-center fs-5">Grade 1 - Daisy</span>
                                                <hr>
                                                <div class="row ">
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">50 - Male</span>
                                                    </div>
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">50 - Male</span>
                                                    </div>
                                                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                                                                <span class="d-block">50 - Male</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                                <span class="d-block">Grade 1 - Daisy</span>
                                                                <span class="d-block">100 - Total students</span>
                                                                <span class="d-block">50 - Male</span>
                                                                <span class="d-block">50 - Female</span>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                                <span class="d-block">Grade 1 - Daisy</span>
                                                                <span class="d-block">100 - Total students</span>
                                                                <span class="d-block">50 - Male</span>
                                                                <span class="d-block">50 - Female</span>
                                                    </div>
                                                    
                                                </div>
                                                <hr>
                                                <div class="row text-center">
                                                    <div class="col-12 col-sm-6">
                                                        <a href="" class="btn btn-light">CSV</a>
                                                              
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <a href="{{url('sresmis/teacher/export-sf1')}}" class="btn btn-light">Excel</a>
                                                               
                                                    </div>
                                                    
                                                </div>
                                </div>
                            </div>
         
                    </div>

                
                
                </div>
            </div>
        </div>
@endsection
