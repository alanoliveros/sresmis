@extends('web.backend.layouts.app')
@section('title', 'Teacher | Subject')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Advisory</h5>
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
                            <form action="{{ route('sresmis.teacher.advisory.grades-by-school-year') }}" method="POST">
                                @csrf
                                <div class="row my-3 ">
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3">
                                            <select class="form-select school_year_by_advisory" required
                                                aria-label="select example" name="school_year">
                                                <option selected disabled>Select School Year</option>
                                                @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->id }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-secondary rounded-0 filter_student">Filter</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 d-none add_new_record">

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
