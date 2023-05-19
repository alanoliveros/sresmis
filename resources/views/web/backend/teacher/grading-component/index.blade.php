@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><i class="bi bi-building-fill-check"></i> @yield('title')</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">

                                            @foreach ($sessions as $session)
                                                <option {{ $session->status == 1 ? 'selected' : 'disabled' }} value="{{ $session->school_year }}">{{ $session->school_year }} {{ $session->status == 2 ? '--Disabled--' : '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select" name="school_year" id="">
                                            @foreach ($quarters as $quarter)
                                                <option value="{{ $quarter->id }}">{{ $quarter->quarter_name }}
                                                 </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">

                                        <select class="form-select subject_select" name="school_year" id="">
                                            <option selected disabled>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subjectName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <button class="btn btn-primary rounded-0 filter_data">Search</button>
                                    </div>
                                </div>
                                <div class="col-3 gx-1">
                                    <div class="mb-3 p-2">
                                        <a href="{{route('teacher.create-grade.grade-component')}}" class="btn btn-light border-dark rounded-0">+ Create</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.grading-component.script')
@endsection
