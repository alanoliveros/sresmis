@extends('web.backend.layouts.app')
@section('title' , 'Section')
@section('content')
    <main id="main" class="main">

        {{--<div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>--}}<!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body" style="padding-bottom: 0;">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-secondary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addSection">+ Add @yield('title')</a>
                                @include('web.backend.admin.academics.section.create')
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body pt-3">

                            {{--<div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                                <a href="" class="btn btn-primary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addSection">+ Add @yield('title')</a>
                                @include('web.backend.admin.academics.section.create')
                            </div>--}}

                            <!-- Table with stripped rows -->

                            <table class="table" id="components-datatable">
                                <thead>
                                <tr>
                                    <th scope="col">Grade Level</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($sections as $key=>$section)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$section}}</td>
                                        <td></td>
                                        <td>
                                            <a href=""><i class="bi bi-eye-fill"></i></a>
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                            <a href=""><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach--}}

                                {{--@foreach($glevel as $gradeLevelId => $data)
                                    <tr>
                                        <th>{{ $data['gradeLevel'] }}</th>

                                        <td>
                                            @foreach($data['sections'] as $section)
                                                {{ $section->sectionName }}

                                            @endforeach
                                        </td>


                                        <td>
                                            <a href=""><i class="bi bi-eye-fill"></i></a>
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                            <a href=""><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach--}}

                                @foreach($glevel as $gradeLevelId => $data)
                                    <tr>
                                        <td>{{ $data['gradeLevel'] }}</td>

                                        <td>
                                            @foreach($data['sections'] as $key => $section)
                                                {{ $section->sectionName }}
                                                @if(!$loop->last && $key !== count($data['sections']) - 1)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            {{--<a href=""><i class="bi bi-eye-fill"></i></a>--}}
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                            <a href=""><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                                {{--        @foreach($glevel as $gradeLevelId => $data)
                                            <h1>{{ $data['gradeLevel'] }}</h1>

                                            @foreach($data['sections'] as $section)
                                                <p>{{ $section->sectionName }}</p>
                                            @endforeach
                                        @endforeach--}}

                                {{--@php
                                    $previousGradeLevel = null;
                                    $mergedSections = '';
                                @endphp

                                @foreach($sections as $key => $section)
                                    @if($previousGradeLevel !== $section->gradeLevelName)
                                        @if($previousGradeLevel !== null)
                                            <tr>
                                                <th --}}{{--colspan="2"--}}{{-->{{$previousGradeLevel}}</th>
                                                <td>{{$mergedSections}}</td>
                                                <td>
                                                    <a href=""><i class="bi bi-eye-fill"></i></a>
                                                    <a href=""><i class="bi bi-pencil-square"></i></a>
                                                    <a href=""><i class="bi bi-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                        @php
                                            $previousGradeLevel = $section->gradeLevelName;
                                            $mergedSections = $section->sectionName;
                                        @endphp
                                    @else
                                        @php
                                            $mergedSections .= ', ' . $section->sectionName;
                                        @endphp
                                    @endif
                                @endforeach

                                @if($previousGradeLevel !== null)
                                    <tr>
                                        <th colspan="2">{{$previousGradeLevel}}</th>
                                        <td>{{$mergedSections}}</td>
                                        <td>
                                            <a href=""><i class="bi bi-eye-fill"></i></a>
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                            <a href=""><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endif--}}


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

