@extends('web.backend.layouts.app')
@section('title', 'Teacher | SF1')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> @yield('title')</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Advisory</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <select class="form-select school_year" required aria-label="select example"
                                            name="school_year">
                                            @foreach ($sessions as $key => $session)
                                                <option {{ $session->status == 1 ? 'selected' : 'disabled' }}
                                                    value="{{ $session->school_year }}"
                                                    {{ $session->status == 2 ? 'class=not-available' : '' }}>
                                                    {{ $session->school_year }}
                                                    {{ $session->status == 2 ? '--Not Available--' : '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <select class="form-select school_year" required aria-label="select example"
                                            name="student_id">
                                            @foreach ($students as $key => $student)
                                                <option value="{{ $student->studentId }}">
                                                    {{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- add student start --}}
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="mb-3 addstudent-button">
                                        <a href="{{ route('teacher.create-grade.student-advisory') }}"
                                            class="btn btn-primary rounded-0 float-md-end"><i class="bi bi-folder-plus"></i>
                                            save</a>

                                        {{-- @include('web.backend.teacher.quarterly-grade.advisory.create') --}}

                                    </div>
                                </div>
                                {{-- add student start --}}
                                <hr>

                                <div class="here">
                                    <form action="{{ route('teacher.save-quarterly-grade.by-advisory') }}" method="POST">
                                        @csrf

                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Learning Areas</th>
                                                    <th>Q1</th>
                                                    <th>Q2</th>
                                                    <th>Q3</th>
                                                    <th>Q4</th>
                                                    <th>Final Grades</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subjects as $subject)
                                                    <tr class="subject_{{ $subject->id }}">
                                                        <td>{{ $subject->subjectName }}</td>
                                                        <td><input type="number" min="1" name="quarter1[]"
                                                                class="quarter"></td>
                                                        <td><input type="number" min="1" name="quarter2[]"
                                                                class="quarter"></td>
                                                        <td><input type="number" min="1" name="quarter3[]"
                                                                class="quarter"></td>
                                                        <td><input type="number" min="1" name="quarter4[]"
                                                                class="quarter"></td>
                                                        <td class="final-grade"></td>
                                                        <td class="remarks"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>


                                </div>


                            </div>

                            <div class="students_table">

                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.quarterly-grade.advisory.script')
@endsection
