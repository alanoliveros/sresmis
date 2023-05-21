@extends('web.backend.layouts.app')
@section('title' , 'Student')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-secondary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addStudent">+ Add @yield('title')</a>
                                {{--@include('web.backend.admin.academics.section.create')--}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">

                            <div class="row">
                                <div class="col-12 col-md-2">

                                    <div class="mb-3">
                                        <select class="form-select select_sy"
                                                aria-label="select example"
                                                name="school_year" required>
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="mb-3">
                                        <select class="form-select grade_level_id"
                                                aria-label="select example"
                                                name="school_year" required>
                                            <option selected disabled>Select Grade Level</option>
                                            @foreach ($grade_levels as $key => $level)
                                                <option value="{{ $level->id }}">
                                                    {{ $level->gradeLevelName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 student_data_container">
                                <div class="text-center">
                                    <img class="w-25" src="{{asset('storage/image/empty_box.png')}}" alt="">
                                <h3 class="mt-3">No data</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>



