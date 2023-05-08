@extends('web.backend.layouts.app')
@section('title', 'Teacher | Advisory | School Year')
@section('content')
    <main id="main" class="main">

        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i>Advisory</h5>
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
                            <div class="my-2  bg-dark text-center">
                                <span class="fw-bold p-1 text-light"><i class="bi bi-gender-female"></i> MALE ( <small
                                        class="">{{ count($male) }}</small> )</span>
                            </div>

                            <div class="row">
                                @if (count($male) > 0)
                                    @foreach ($male->sortBy('lastname') as $m)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="card border border-dark" style="height: 100%">
                                                <img class="card-img-top w-75 align-self-center mt-2"
                                                    src="{{ $m->image == 'avatar.png' ? asset('storage/student_img/boy.png') : '' }}"
                                                    alt="Card image cap">
                                                <div class="card-block text-center">
                                                    <h4 class="card-title fw-bold">
                                                        <u>{{ $m->lastname . ', ' . $m->name }}</u>
                                                    </h4>

                                                </div>
                                                <div class="card-body">

                                                    <span>Birthdate</span>
                                                    <span class="float-end">Age</span>

                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="http://v4-alpha.getbootstrap.com/components/card/"
                                                        class="btn btn-light border-dark rounded-0">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="card border border-dark" style="height: 100%">
                                            <span class="m-auto text-danger">No record for male</span>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="my-2  bg-danger text-center">
                                <span class="fw-bold p-1 text-light"><i class="bi bi-gender-female"></i> FEMALE ( <small
                                        class="">{{ count($female) }}</small> )</span>
                            </div>

                            <div class="row mt-2">
                                @if (count($female) > 0)
                                    @foreach ($female->sortBy('lastname') as $m)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="card border border-dark" style="height: 100%">
                                                <img class="card-img-top w-75 align-self-center mt-2"
                                                    src="{{ $m->image == 'avatar.png' ? asset('storage/student_img/girl.png') : '' }}"
                                                    alt="Card image cap">
                                                <div class="card-block text-center">
                                                    <h4 class="card-title fw-bold">
                                                        <u>{{ $m->lastname . ', ' . $m->name }}</u>
                                                    </h4>

                                                </div>
                                                <div class="card-body">

                                                    <span>Birthdate</span>
                                                    <span class="float-end">Age</span>

                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="http://v4-alpha.getbootstrap.com/components/card/"
                                                        class="btn btn-light border-dark rounded-0">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                @else
                                    <div class="col-12">
                                        <div class="card border border-dark" style="height: 100%">
                                            <span class="m-auto text-danger">No record for female</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </section>
    </main>
@endsection
