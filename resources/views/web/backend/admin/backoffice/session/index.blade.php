@extends('web.backend.layouts.app')
@section('title' , 'Session')
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
                                   data-bs-target="#addSection">+ Add @yield('title')</a>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card pt-3">
                                <div class="card-body">
                                    <!-- Table with stripped rows -->
                                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                                        Active session
                                    </div>
                                    <div class="row">
                                    <div class="col-8">
                                        <select class="form-select select_sy" required aria-label="select example"
                                                name="school_year">
                                            <option selected disabled>Select School Year</option>
                                            @foreach ($sessions as $key => $session)
                                                <option value="{{ $session->school_year }}">
                                                    {{ $session->school_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary"><i class="bi bi-check-lg"></i> Activate</button>
                                    </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Table with stripped rows -->

                                    <table class="table table-borderless mt-3" id="{{--components-datatable--}}">
                                        <thead>
                                        <tr>
                                            <th scope="col">Session title</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sessions as $key=>$session)
                                            <tr>
                                                <td>{{$session->school_year}}</td>
                                                <td style="font-style: italic;">{{$session->status == 1?'Active':'Deactive'}}</td>
                                                <td style="padding-bottom: 0; padding-top: 0;">
                                                    <div class="btn-group">
                                                        <a type="button" data-bs-toggle="dropdown" data-bs-auto-close="true"
                                                           aria-expanded="false" href="">
                                                            <i class="bi bi-three-dots" style="font-size: 26px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash3"></i> Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->

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
