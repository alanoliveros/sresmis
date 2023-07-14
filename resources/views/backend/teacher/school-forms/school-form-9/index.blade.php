@extends('layouts.app')
@section('title', 'SRESMIS | School-Form-9')
@section('content')
    <div class="page-wrapper">
        {{-- asd --}}
        
        <div class="page-breadcrumb">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title my-2 fs-3">School Form 9</h4>
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
                    
                    <div class="col-md-6 col-lg-6 col-xlg-3 sf1_fetch_data">
                        <a href="">
                            <div class="card">
                            <div class="box bg-warning text-danger text-center">
                                <span class="">No data found</span>
                                
                            </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
