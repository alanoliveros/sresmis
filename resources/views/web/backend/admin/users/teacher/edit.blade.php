@extends('web.backend.layouts.app')
@section('title' , 'Teacher')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="card-title">
                                <span class="fs-4">@yield('title')</span>
                            </div>

                            <div class="container">
                                <h1>Edit Teacher Details</h1>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <h5 class="card-title">Name</h5>
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $teacher->user->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="middleName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middleName" name="middleName" value="{{ $teacher->user->middlename }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $teacher->user->lastname }}" required>
                                            </div>

                                            <h5 class="card-title">Email</h5>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->user->email }}" required>
                                            </div>

                                            <h5 class="card-title">Gender</h5>
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-select" id="gender" name="gender" required>
                                                    <option value="Male" {{ $teacher->user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $teacher->user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Other" {{ $teacher->user->gender === 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>

                                            <h5 class="card-title">Address</h5>
                                            <div class="mb-3">
                                                <label for="purok" class="form-label">Purok</label>
                                                <input type="text" class="form-control" id="purok" name="purok" value="{{ $teacher->address->purok }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="barangay" class="form-label">Barangay</label>
                                                <input type="text" class="form-control" id="barangay" name="barangay" value="{{ $teacher->address->barangay }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{ $teacher->address->city }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="province" class="form-label">Province</label>
                                                <input type="text" class="form-control" id="province" name="province" value="{{ $teacher->address->province }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="zipCode" class="form-label">Zip Code</label>
                                                <input type="text" class="form-control" id="zipCode" name="zipCode" value="{{ $teacher->address->zipCode }}">
                                            </div>

                                            <h5 class="card-title">Teacher Details</h5>
                                            <div class="mb-3">
                                                <label for="schoolYear" class="form-label">School Year</label>
                                                <input type="text" class="form-control" id="schoolYear" name="schoolYear" value="{{ $teacher->school_year }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gradeLevelTaught" class="form-label">Grade Level Taught</label>
                                                <select class="form-select gradeLevelTaught" id="gradeLevelTaught" name="gradeLevelTaught">
                                                    @foreach ($gradeLevels as $gradeLevel)
                                                        <option value="{{ $gradeLevel->id }}" {{ $teacher->gradeLevel->id === $gradeLevel->id ? 'selected' : '' }}>{{ $gradeLevel->gradeLevelName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sectionTaught" class="form-label">Section Taught</label>
                                                <select class="form-select" id="sectionTaught" name="sectionTaught">
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}" {{ $teacher->section->id === $section->id ? 'selected' : '' }}>{{ $section->sectionName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="designation" class="form-label">Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation" value="{{ $teacher->designation }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeNumber" class="form-label">Employee Number</label>
                                                <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" value="{{ $teacher->employeeNumber }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="position" class="form-label">Position</label>
                                                <input type="text" class="form-control" id="position" name="position" value="{{ $teacher->position }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="fundSource" class="form-label">Fund Source</label>
                                                <input type="text" class="form-control" id="fundSource" name="fundSource" value="{{ $teacher->fundSource }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="degree" class="form-label">Degree</label>
                                                <input type="text" class="form-control" id="degree" name="degree" value="{{ $teacher->degree }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="major" class="form-label">Major</label>
                                                <input type="text" class="form-control" id="major" name="major" value="{{ $teacher->major }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="minor" class="form-label">Minor</label>
                                                <input type="text" class="form-control" id="minor" name="minor" value="{{ $teacher->minor }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="minPerWeek" class="form-label">Total Teaching Time Per Week (minutes)</label>
                                                <input type="number" class="form-control" id="minPerWeek" name="minPerWeek" value="{{ $teacher->totalTeachingTimePerWeek }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ancillary" class="form-label">Number of Ancillary</label>
                                                <input type="number" class="form-control" id="ancillary" name="ancillary" value="{{ $teacher->numberOfAncillary }}">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
                                        </form>
                                    </div>
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
