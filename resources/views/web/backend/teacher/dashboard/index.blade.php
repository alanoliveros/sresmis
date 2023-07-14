@extends('web.backend.layouts.app')
@section('title', 'Teacher | Dashboard')
@php
    $elementActive = 'Dashboard';
@endphp
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-12 col-md-4">
                    <h1>School Year {{ $activeSession->school_year }}</h1>
                </div>
            </div>
            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card h-75">
                                <div class="card-body ">

                                    <h5 class="card-title text-center">Students</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-center text-danger fw-bold fs-4">{{ count($students) }}</h6>
                                            <span class="text-muted small pt-1 fw-bold">Total number of students</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card h-75">
                                <div class="card-body ">
                                    <h5 class="card-title text-center">Today's Attendance</span></h5>
                                    <div class="">

                                        <div class="">
                                            <div class="row">
                                                <div class="col-6 text-center">
                                                    <h6 class="text-center text-danger fw-bold fs-4">{{ count($students) }}
                                                    </h6>
                                                    <span class="text-muted small pt-2 fw-bold">Present</span>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <h6 class="text-center text-danger fw-bold fs-4">{{ count($students) }}
                                                    </h6>
                                                    <span class="text-muted small pt-2 fw-bold">Absent</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted">Quarterly | Grading</span></h5>

                            <div class="activity">

                                <div class="activity-item d-flex">
                                    <div class="activite-label">status</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        1st Grading
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">status</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        2nd Grading
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">status</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        3rd Grading
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">status</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        4th Grading
                                    </div>
                                </div><!-- End activity item-->

                                {{-- <div class="activity-item d-flex">
                                    <div class="activite-label">56 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis eveniet
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias voluptatem
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 day</div>
                                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                    <div class="activity-content">
                                        Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati
                                            voluptatem</a> tempore
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 days</div>
                                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                    <div class="activity-content">
                                        Est sit eum reiciendis exercitationem
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">4 weeks</div>
                                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                    </div>
                                </div><!-- End activity item--> --}}

                            </div>

                        </div>
                    </div><!-- End Recent Activity -->

                    <!-- Budget Report -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>


                    </div><!-- End Budget Report -->

                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>


                    </div><!-- End Website Traffic -->

                    <!-- News & Updates Traffic -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                    </div><!-- End News & Updates -->

                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

@endsection
