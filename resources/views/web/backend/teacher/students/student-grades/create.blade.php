@extends('web.backend.layouts.app')
@section('title', 'SRESMIS | Grades')
@section('content')
<input type="text" name="" id="" class="sub_id" value="">
    <main id="main" class="main">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title my-2"><i class="bi bi-person-lines-fill"></i> Create </h5>
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
                <div class="col-12 ">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body ">
                            <div class="row my-3 ">
                                
                                <div class="col d-flex justify-content-end gradeComponents">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#written_works" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Written Works</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#performance_tasks" type="button" role="tab"
                                                aria-controls="contact" aria-selected="false">Performance Tasks</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link get_final_grade" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#contact" type="button" role="tab"
                                                data-students_final_grade='["written_works", "performance_tasks"]'
                                                aria-controls="contact" aria-selected="false">Transmuted Grade</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 studentGradingSystemContainer">
                                    <div class="tab-content pt-2" id="myTabContent">
                                        <div class="tab-pane fade show active" id="written_works" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="written_work_container table-responsive">
                                                <table data-grade_component="Written Works"
                                                    class="table table-stripped written_works">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center">1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tr class="text-success written_tasks_possible_score">
                                                        <th class="text-center">HIGHEST POSSIBLE SCORE</th>
                                                        <th><input type="number" name="written_score[]"
                                                                data-total_possible_score="written_tasks_possible_score"
                                                                class="written_score" min="1">
                                                        </th>
                                                        <th class="between_highest_score total_high_score">Total</th>
                                                        <th data-val="100" class="percentage">100%</th>
                                                        <th class="tasks_average written_works_average"></th>
                                                        <th class="text-center"><button type="button"
                                                                class="btn btn-success text-light rounded-0  add_score"
                                                                data-gcomponent="written_works">+</button>
                                                        </th>
                                                    </tr>
                                                    <tbody class="display_student_data">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                        {{-- performance tasks --}}
                                        <div class="tab-pane fade" id="performance_tasks" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="table-responsive">
                                                <table data-grade_component="Performance Tasks"
                                                    class="table table-stripped performance_tasks">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>1</th>
                                                            <th class="between_count_num">Total</th>
                                                            <th>PS</th>
                                                            <th>WA</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tr class="text-success performance_tasks_possible_score">
                                                        <th class="text-center">HIGHEST POSSIBLE SCORE</th>
                                                        <th><input
                                                                data-total_possible_score="performance_tasks_possible_score"
                                                                type="number" name="written_score[]"
                                                                class="written_score" min="1">
                                                        </th>
                                                        <th class="between_highest_score total_high_score">Total</th>
                                                        <th>100%</th>
                                                        <th class="tasks_average performance_tasks_average"></th>
    
                                                        <th class="text-center"><button type="button"
                                                                class="btn btn-success rounded-0  add_score"
                                                                data-gcomponent="performance_tasks">+</button>
                                                        </th>
                                                    </tr>
                                                    <tbody class="display_student_data">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- student final grade --}}
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">
                                            <div class=" table-responsive">
                                                <table data-grade_component="Quarterly Grades"
                                                    class="table table-stripped quarterly_grade">
                                                    <thead>
                                                        <tr>
    
                                                            <th class="text-center">Student Name</th>
                                                            <th class="initial_grade">Initial Grade</th>
                                                            <th class="transumted_grade">Transmuted Grade</th>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody class="display_student_grade">

                                                        
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
            </div><!-- End Recent Sales -->
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    @include('web.backend.teacher.students.student-grades.createScript')
@endsection
