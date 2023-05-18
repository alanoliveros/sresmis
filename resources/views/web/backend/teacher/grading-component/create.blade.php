@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
<style>
    .table {
        width: 100%;
        padding-bottom: 1rem;
    }

    .table th:first-child{
        color: black;
        font-weight: bold;
    }
    .table th:first-child,
    .table td:first-child {
        position: sticky;
        left: 0;
        background-color: white;
    }

    .table td {
        white-space: nowrap;
    }

    .table-scrollable {
        overflow-x: auto;
    }

    @media (max-width: 576px) {
        .input-responsive {
            width: 100%;
        }
    }
</style>

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>icon here @yield('title')</h1>
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
                                                <option {{ $session->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $session->school_year }}">{{ $session->school_year }}
                                                    {{ $session->status == 2 ? '--Disabled--' : '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select" name="school_year" id="">
                                            @foreach ($quarters as $quarter)
                                                <option {{ $quarter->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $quarter->id }}">{{ $quarter->quarter_name }}
                                                    {{ $quarter->status == 2 ? '--Disabled--' : '' }} </option>
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

                                <div class="col-12">
                                    <div class="mb-3 p-2">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sticky">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                        <th class="text-center">5</th>
                                                        <th class="text-center">6</th>
                                                        <th class="text-center">7</th>
                                                        <th class="text-center">8</th>
                                                        <th class="text-center">9</th>
                                                        <th class="text-center">10</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">PS</th>
                                                        <th class="text-center">WA</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap">Highest Possible Score</th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                        <th><input type="number" name="possible_score[]" min="1"
                                                                class="input-sm input-responsive"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($students as $student)
                                                        <tr>
                                                            <td>{{$student->lastname. ', '.$student->name}}</td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                            <td><input type="number" name="student_score[]" min="1" class="input-sm input-responsive"></td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
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
    @include('web.backend.teacher.grading-component.createScript')
@endsection
