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

                                        <td style="padding-bottom: 0; padding-top: 0;">
                                            <div class="btn-group">
                                                <a type="button" data-bs-toggle="dropdown" data-bs-auto-close="true"
                                                   aria-expanded="false" href="">
                                                    <i class="bi bi-three-dots" style="font-size: 26px;"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i> Show</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
<x-datatable/>

