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
                                <div class="row">
                                    {{-- first Col --}}
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class=""><i class="mdi mdi-book-multiple "></i>&nbsp;Section / Grade Level</span>
                                                <div class="text-light"><span class="mx-2">{{$sectionName->sectionName}}</span> | <span class="mx-2"><i>{{$sectionName->gradeLevelName}}</i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class=""><i class="mdi mdi-book-multiple "></i>&nbsp;Subject / School Year</span>
                                                <div class="text-light"><span class="mx-2">{{$subjectselect->subjectName}}</span> | <span class="mx-2"><i>{{$yearselect->school_year}}</i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-light">
                                            <div class="col-md-12">

                                                <span class=""><i class="mdi mdi-book-multiple "></i>&nbsp;Grade Status</span>
                                                <div class="text-light"><span class="mx-2"> Posted </span> | <span class="mx-2"><i> Date Posted </i></span></div>
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex align-items-end">
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="box bg-light">
                            {{-- table responsive --}}
                      <div class="table-responsive">
                        <table id="" class="table table-bordered table-light table-hover" style="font-size:11px">
                            <thead>
                               
                                <tr class="">
                                  <th scope="col" class="text-dark text-center">Student</th>
                                  <th scope="col" colspan="13" class="text-dark text-center">WRITTEN WORKS</th>
                                  
                                  <th scope="col" colspan="13" class="text-dark text-center">PERFORMANCE TASKS</th>
                                 
                                  <th scope="col" class="text-dark">1</th>
                                 
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">Average</th>
                                  <th scope="col" class="text-dark">Percentage Weight</th>
                                  <th scope="col" class="text-dark">Tentative Grade</th>
                                  <th scope="col" class="text-dark">Transmuted Grade</th>
                                </tr>
                                <tr class="">
                                  <th scope="col" class="text-dark text-center">Student</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">3</th>
                                  <th scope="col" class="text-dark">4</th>
                                  <th scope="col" class="text-dark">5</th>
                                  <th scope="col" class="text-dark">6</th>
                                  <th scope="col" class="text-dark">7</th>
                                  <th scope="col" class="text-dark">8</th>
                                  <th scope="col" class="text-dark">9</th>
                                  <th scope="col" class="text-dark">10</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">3</th>
                                  <th scope="col" class="text-dark">4</th>
                                  <th scope="col" class="text-dark">5</th>
                                  <th scope="col" class="text-dark">6</th>
                                  <th scope="col" class="text-dark">7</th>
                                  <th scope="col" class="text-dark">8</th>
                                  <th scope="col" class="text-dark">9</th>
                                  <th scope="col" class="text-dark">10</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">Average</th>
                                  <th scope="col" class="text-dark">Percentage Weight</th>
                                  <th scope="col" class="text-dark">Tentative Grade</th>
                                  <th scope="col" class="text-dark">Transmuted Grade</th>
                                </tr>
                                <tr class="">
                                  <th scope="col" class="text-dark text-center">Highest Possible Score</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">3</th>
                                  <th scope="col" class="text-dark">4</th>
                                  <th scope="col" class="text-dark">5</th>
                                  <th scope="col" class="text-dark">6</th>
                                  <th scope="col" class="text-dark">7</th>
                                  <th scope="col" class="text-dark">8</th>
                                  <th scope="col" class="text-dark">9</th>
                                  <th scope="col" class="text-dark">10</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">3</th>
                                  <th scope="col" class="text-dark">4</th>
                                  <th scope="col" class="text-dark">5</th>
                                  <th scope="col" class="text-dark">6</th>
                                  <th scope="col" class="text-dark">7</th>
                                  <th scope="col" class="text-dark">8</th>
                                  <th scope="col" class="text-dark">9</th>
                                  <th scope="col" class="text-dark">10</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">1</th>
                                  <th scope="col" class="text-dark">2</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">PS</th>
                                  <th scope="col" class="text-dark">WS</th>
                                  <th scope="col" class="text-dark">Total</th>
                                  <th scope="col" class="text-dark">Average</th>
                                  <th scope="col" class="text-dark">Percentage Weight</th>
                                  <th scope="col" class="text-dark">Tentative Grade</th>
                                  <th scope="col" class="text-dark">Transmuted Grade</th>
                                  
                                </tr>
                                
                              </thead>
                              <tbody>
                               
                              </tbody>

                                 
                           
                              
                            </table>
                          </div>
{{-- end table responsive --}}
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
@endsection
@section('scripts')

@endsection

