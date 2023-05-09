@extends('web.backend.layouts.app')
@section('title', 'SRESMIS | Grades')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Grades</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark"><i
                                        class="bi bi-house-door"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Grades</a>
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
                            <div class="row my-3 ">
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select select_sy" required aria-label="select example"
                                            name="school_year">
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->id }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <select class="form-select school_year_by_subject" required
                                            aria-label="select example" name="school_year">
                                            <option selected disabled>Select Subject</option>
                                            @foreach ($subjects as $key => $subject)
                                                <option value="{{ $subject->id }}">
                                                    {{ $subject->subjectName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <button type="button" disabled
                                            class="btn btn-secondary rounded-0 filter_grades">Filter</button>
                                    </div>
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
    <script>
        let sy_id = 0;
        let sub_id = 0;
        $(document).ready(function() {
            $(".select_sy").on('change', function() {
                sy_id = $(".select_sy :selected").val();
                if (sy_id != 0 && sub_id != 0) {
                    $('.filter_by').prop('disabled', false);
                }
            });
            $(".school_year_by_subject").on('change', function() {
                sub_id = $(".school_year_by_subject :selected").val();
                if (sy_id != 0 && sub_id != 0) {
                    $('.filter_by').prop('disabled', false);
                }
            });
            $(".filter_grades").on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: '/sresmis/teacher/student-information/by-subject/filter',
                    data: {
                        "sy_id": sy_id,
                        "sub_id": sub_id,
                    },
                    success: function(data) {
                        console.log(data.students);
                    }
                });
            });

        });
    </script>
@endsection
