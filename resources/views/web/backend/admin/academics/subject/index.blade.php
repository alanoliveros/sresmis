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
                                    <a href="" class="btn btn-secondary float-end" data-bs-toggle="modal"
                                       data-bs-target="#addSection">+ Add @yield('title')</a>
                                    @include('web.backend.admin.academics.subject.create')
                                </div>
                            </div>
                        </div>


                    <div class="card">
                        <div class="card-body pt-3">

                            <table class="table" id="subject-datatable">
                                <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $key=>$subject)
                                    <tr>
                                        <td>{{ $subject->subjectName }}</td>
                                        <td>{{ $subject->description }}</td>
                                        <td style="padding-bottom: 0; padding-top: 0;">

                                            @include('components.dropdown', [
                                                            'showRoute' => route('subject.show', $subject->id),
                                                            'editRoute' => route('subject.edit', $subject->id),
                                                            'deleteRoute' => route('subject.destroy', $subject->id)
                                                        ])
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
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>

