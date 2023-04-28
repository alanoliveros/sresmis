@extends('layouts.app')
@section('title', 'SRESMIS | GRADES')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    {{-- <h4 class="page-title">Grades</h4> --}}
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grades
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">{{$sectionName->gradeLevelName .' - '.$sectionName->sectionName}}</h4>
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
                            <form action="{{route('sresmis.teacher.grades.filter')}}">
                                @csrf
                                <div class="row">
                                    {{-- first Col --}}
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 ">
                                            <div class="col-md-12">
                                                <label for="validationDefault04" class="form-label text-light">Select Subject</label>
                                                <select name="getSubject" required class="form-select getSubject" id="validationDefault04" required>
                                                <option selected disabled value="">Choose...</option>
                                                    @foreach($class_schedules as $key=>$subject)
                                                        <option value="{{$subject->id}}">{{$subject->subjectName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                            <div class="col-md-12">
                                                <label for="validationDefault04" class="form-label text-light">Select School-Year</label>
                                                <select name="getYear" required class="form-select getYear" id="validationDefault04" required>
                                                <option selected disabled>Choose...</option>
                                                    @foreach($schoolYear as $key=>$year)
                                                        <option value="{{$year->id}}">{{$year->school_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex align-items-end">
                                            <button type="submit" class="btn btn-warning form-control text-dark fw-bold filterGrade"><i class="mdi mdi-magnify fs-5"></i>Filter</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
@endsection
@section('scripts')



<script>
    let yearSelected = '';
    let subjectSelected = '';
    $(document).ready(function(){
        // $('body').on('click', '.quarterGrading',function(){


        // });

        // $('.getSubject').change(function () {
        //     subjectSelected = $(this).find("option:selected");
        //     // var valueSelected  = optionSelected.val();
        //     // var textSelected   = optionSelected.text();
        //     if(subjectSelected.val() != null && yearSelected.val() != null){
        //         $('.filterGrade').prop("disabled", false); 
        //     }
        // });
        // $('.getYear').change(function () {
        //     let yearSelected = $(this).find("option:selected");
        //     // var valueSelected  = optionSelected.val();
        //     // var textSelected   = optionSelected.text();
        //     if(yearSelected.val() != null && subjectSelected.val() != null){
        //         $('.filterGrade').prop("disabled", false); 
        //     }
        // });
    });
</script>
@endsection

