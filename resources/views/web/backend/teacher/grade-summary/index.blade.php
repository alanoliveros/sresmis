@extends('web.backend.layouts.app')
@section('title', 'Teacher | Grade')
@section('content')
<style>
    .table {

  width: 100%;
  padding-bottom: 1rem;

}
.table .th_parent,
.table tbody td:first-child {
  position: sticky;
  left: 0;
  background-color: rgb(246, 253, 252);
  color: black;
  font-weight: bold;

}
.table td {
  white-space: nowrap;
}

</style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><i class="bi bi-building"></i> @yield('title')</h1>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option selected disabled>Select School Year
                                            </option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->school_year }}">{{ $session->school_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <button class="btn btn-primary rounded-0 filter_data">Filter</button>
                                    </div>
                                </div>
                                <div class="col-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <a href="{{ route('teacher.create-grade.grade-component') }}"
                                            class="btn btn-light border-dark rounded-0">+ Create</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table table-responsive summary_grade_table">
                                        


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
    @include('web.backend.teacher.grade-summary.script')
@endsection
