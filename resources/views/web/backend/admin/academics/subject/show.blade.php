@extends('web.backend.layouts.app')
@section('title' , 'Subject')
@section('content')
    <main id="main" class="ma`in">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">


                            <div class="container">
                                <h1>{{ $subject->subjectName }}</h1>
                                <p>{{ $subject->description }}</p>
                                <p>Written Work Percentage: {{ $subject->written_work_percentage }}</p>
                                <p>Performance Tasks Percentage: {{ $subject->performance_tasks_percentage }}</p>
                                <p>Quarterly Assessment Percentage: {{ $subject->quarterly_assessment_percentage }}</p>

                                <a href="{{ route('subject.index') }}" class="btn btn-primary">Back</a>
                                <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-primary">Edit</a>

                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>
