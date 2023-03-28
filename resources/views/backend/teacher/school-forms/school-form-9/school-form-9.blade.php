@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">School Form 9</h4>
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
        </div>


        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-12 col-md-12 col-lg-12 col-xlg-12">
                    <div class="card card-hover bg-light shadow">
                        <div class="box bg-cyan">
                            <h4 class="text-light">School Year</h4>
                            <select name="sessions" id="session_sf9" class="form-select border border-secondary">
                                @foreach($sessions as $key=>$session)
                                    <option {{($key == 0) ? 'selected' : ''; }} value="{{$session->school_year}}" >{{$session->school_year}}</option>
                                @endforeach
                            </select>
                            {{$first_session->school_year}}
                        </div>
                    </div>
                </div>
                <!-- Column -->
                
            </div>
        </div>
@endsection
