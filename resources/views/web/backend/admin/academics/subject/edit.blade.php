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
                                {{--<a href="" class="btn btn-secondary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addSubject">+ Add @yield('title')</a>--}}
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">


                            <div class="container">
                                <h1>Edit Subject</h1>

                                <form method="POST" action="{{ route('subject.update', $subject->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="subjectName" class="form-label">Subject Name</label>
                                        <input type="text" class="form-control" id="subjectName" name="subjectName" value="{{ $subject->subjectName }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ $subject->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="writtenWork" class="form-label">Written Work Percentage</label>
                                        <input type="text" class="form-control" id="writtenWork" name="writtenWork" value="{{ $subject->written_work_percentage }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="performanceTask" class="form-label">Performance Tasks Percentage</label>
                                        <input type="text" class="form-control" id="performanceTask" name="performanceTask" value="{{ $subject->performance_tasks_percentage }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="quarterlyAssessment" class="form-label">Quarterly Assessment Percentage</label>
                                        <input type="text" class="form-control" id="quarterlyAssessment" name="quarterlyAssessment" value="{{ $subject->quarterly_assessment_percentage }}">
                                    </div>
                                    <a href="{{ route('subject.index') }}" class="btn btn-primary">Back</a>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
