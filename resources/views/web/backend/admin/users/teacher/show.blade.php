@extends('web.backend.layouts.app')
@section('title' , 'Subject')
@section('content')
    <main id="main" class="ma`in">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">


                            <div class="container">
                                <h1>Teacher Details</h1>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{ $teacher->user->name }} {{ $teacher->user->middlename }} {{ $teacher->user->lastname }}</h5>
                                        <p class="card-text">Email: {{ $teacher->user->email }}</p>
                                        <p class="card-text">Gender: {{ $teacher->user->gender }}</p>
                                        <hr>
                                        <h5 class="card-title">Address:</h5>
                                        <p class="card-text">Purok: {{ $teacher->address->purok }}</p>
                                        <p class="card-text">Barangay: {{ $teacher->address->barangay }}</p>
                                        <p class="card-text">City: {{ $teacher->address->city }}</p>
                                        <p class="card-text">Province: {{ $teacher->address->province }}</p>
                                        <p class="card-text">Zip Code: {{ $teacher->address->zipCode }}</p>
                                        <hr>
                                        <h5 class="card-title">Teacher Details:</h5>
                                        <p class="card-text">School Year: {{ $teacher->school_year }}</p>
                                        <p class="card-text">Grade Level Taught: {{ $teacher->gradeLevel->gradeLevelName}}</p>
                                        <p class="card-text">Section Taught: {{ $teacher->section->sectionName}}</p>
                                        <p class="card-text">Designation: {{ $teacher->designation }}</p>
                                        <p class="card-text">Employee Number: {{ $teacher->employeeNumber }}</p>
                                        <p class="card-text">Position: {{ $teacher->position }}</p>
                                        <p class="card-text">Fund Source: {{ $teacher->fundSource }}</p>
                                        <p class="card-text">Degree: {{ $teacher->degree }}</p>
                                        <p class="card-text">Major: {{ $teacher->major }}</p>
                                        <p class="card-text">Minor: {{ $teacher->minor }}</p>
                                        <p class="card-text">Total Teaching Time Per Week: {{ $teacher->totalTeachingTimePerWeek }} minutes</p>
                                        <p class="card-text">Number of Ancillary: {{ $teacher->numberOfAncillary }}</p>

                                        <a href="{{ route('teacher.index')}}" class="btn btn-primary">Back to List</a>
                                        <a href="{{ route('teacher.edit', $teacher->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>
