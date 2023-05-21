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
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option selected disabled>Select Subject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option selected disabled>Select Section</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 gx-1">
                                    <div class="mb-3 p-2">
                                        <select class="form-select school_year_select" name="school_year" id="">
                                            <option selected disabled>Select Section</option>
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
                                    <div class="table ">
                                        <table class="table table-bordered border-dark">
                                            <thead>
                                                <tr>
                                                    <th class="th_parent" rowspan="3">Name of Learners</th>
                                                    <th colspan="5" class="text-center">Mother Tounge</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                    <th colspan="5" class="text-center">English</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                    <th colspan="5">Quarter</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>Final</td>
                                                    <th class="text-center">Initial</th>
                                                    <th class="text-center">General Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td class="">Buknoy</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Final</td>
                                                <td class="text-center">Initial</td>
                                                <td class="text-center">General Average</td>

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
    @include('web.backend.teacher.grade-summary.script')
@endsection
