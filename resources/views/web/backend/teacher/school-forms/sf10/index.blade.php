@extends('web.backend.layouts.app')
@section('title', 'Teacher | SF10')
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
                            <li class="breadcrumb-item" aria-current="page"><a href="">SF10</a>
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
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select select_grade_level" required aria-label="select example"
                                            name="grade_level">
                                            <option selected disabled>Select Grade Level</option>
                                            @foreach ($gradeLevels as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->gradeLevelName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select select_section" required aria-label="select example"
                                            name="school_year">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 studentLists">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.school-forms.sf10.script')
@endsection
