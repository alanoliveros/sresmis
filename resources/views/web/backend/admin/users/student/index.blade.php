@extends('web.backend.layouts.app')
@section('title' , 'Student')
@section('content')
    <main id="main" class="main">

        {{--<div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>--}}<!-- End Page Title -->





        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            {{--<h5 class="card-title">@yield('title')</h5>--}}

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addStudent">+ Add @yield('title')</a>

                            </div>
                                {{--@include('backend.admin.teachers.add-teacher')--}}


                            <div class="row">
                                <div class="col-12 col-md-2">

                                    <div class="mb-3">
                                        <select class="form-select select_sy" required aria-label="select example"
                                                name="school_year">
                                            <option selected disabled>Select School Year</option>
                                            {{--@foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_subject" required
                                                aria-label="select example" name="school_year">
                                            <option selected disabled>Select Grade Level</option>
                                            {{-- @foreach ($subjects as $key => $subject)
                                                 <option value="{{ $subject->id }}">
                                                     {{ $subject->subjectName }}</option>
                                             @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_section" required
                                                aria-label="select example" name="school_year">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <button type="button" disabled
                                                class="btn btn-secondary rounded-0 filter_by">Filter</button>
                                    </div>
                                </div>

                            </div>



                            <!-- Table with stripped rows -->
                            <table class="table" id="components-datatable">
                                <thead>
                                <tr>
                                    <th scope="col">LRN</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->lrn}}</td>
                                        <td>{{$student->lastname.', '.($student->middlename == NULL? '':$student->middlename.', ').$student->name.($student->suffix == NULL? '':', '.$student->suffix)}}</td>
                                        <td>{{$student->remarks}}</td>
                                        <td>
                                            @if($student->status == 1)
                                                Active
                                            @elseif($student->status == 2)
                                                Enactive
                                            @else
                                                {{$student->status}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="bi bi-eye" style="margin-right: 6px"></a>
                                            <a href="" class="bi bi-pencil-square" style="margin-right: 6px"></a>
                                            <a href="" class="bi bi-trash"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>
@section('scripts')
    @include('web.backend.teacher.students.admission-subject.script')
@endsection
