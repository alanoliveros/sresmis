@extends('web.backend.layouts.app')
@section('title', 'Class Schedule')
@section('content')
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> @yield('title')</h5>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Attendance</a>
                            </li>
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
                                <div class="col-md-12 col-lg-4 mb-3">
                                    <select name="" class="form-select sy_select">
                                            <option value="">Select School Year</option>
                                        @foreach ($sessions as $year)
                                            <option value="{{$year->school_year}}">{{$year->school_year}}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="col-md-12 mt-4">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr class="bg-primary text-light">
                                                <th class="border border-dark text-center">Time</th>
                                                <th class="border border-dark text-center">Mon</th>
                                                <th class="border border-dark text-center">Tue</th>
                                                <th class="border border-dark text-center">Wed</th>
                                                <th class="border border-dark text-center">Thu</th>
                                                <th class="border border-dark text-center">Fri</th>
                                                <th class="border border-dark text-center">Sat</th>
                                                <th class="border border-dark text-center">Sun</th>
                                            </tr>    
                                        </thead>
                                        <tbody class="schedule-data text-center">
                                            <tr>
                                                <td colspan="7" class="text-center text-danger">No data found</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    @include('web.backend.teacher.class-schedule.script')
@endsection

