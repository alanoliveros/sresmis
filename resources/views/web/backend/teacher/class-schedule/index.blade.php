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
                                <div class="col-md-12 col-lg-12 col-xlg-12 mb-3">
                                    <div class="row">
                                       
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
