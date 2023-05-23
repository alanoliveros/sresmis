<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable add-teacher" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header bg-secondary rounded-0">
                <h1 class="modal-title fs-5 text-light fs-5">Teacher Personal Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('teacher.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="schoolYear" class="form-label">School Year <small class="text-danger">*</small></label>
                            <select name="schoolYear" class="form-select" id="schoolYear">
                                @foreach ($sessions as  $key=>$schoolYear)
                                    <option {{$key == 0? 'selected':''}} value="{{$schoolYear->school_year}}">{{$schoolYear->school_year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email <small class="text-danger">*</small></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com">
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="col-md-12">
                            <label for="firstName" class="form-label">First name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="John">
                        </div>
                        <div class="col-md-12">
                            <label for="middleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Smith">
                        </div>
                        <div class="col-md-12">
                            <label for="lastName" class="form-label">Last name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Doe">
                        </div>
                        <div class="col-md-12">
                            <label for="suffix" class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Jr.">
                            <small class="form-text text-muted">Example: Jr., Sr., III</small>
                        </div>
                        <div class="col-md-12">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="purok" class="form-label">Address</label>
                            <input type="text" class="form-control" name="purok" id="purok" placeholder="Street/Purok">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Barangay">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="province" id="province" placeholder="Province">
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="zipCode" id="zipCode" placeholder="Zip code">
                        </div>
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation">
                        </div>
                        <div class="col-md-12">
                            <label for="employeeNumber" class="form-label">Employee number</label>
                            <input type="number" min="1" class="form-control" name="employeeNumber" id="employeeNumber" placeholder="e.g., 1234">
                        </div>
                        <div class="col-md-12">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                        <div class="col-md-12">
                            <label for="fundSource" class="form-label">Fund source</label>
                            <input type="text" class="form-control" name="fundSource" id="fundSource" placeholder="e.g., National">
                        </div>
                        <div class="col-md-12">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" class="form-control" name="degree" id="degree" placeholder="e.g., BEED">
                        </div>
                        <div class="col-md-12">
                            <label for="major" class="form-label">Major</label>
                            <input type="text" class="form-control" name="major" id="major" placeholder="e.g., English">
                        </div>
                        <div class="col-md-12">
                            <label for="minor" class="form-label">Minor</label>
                            <input type="text" class="form-control" name="minor" id="minor">
                        </div>
                        <div class="col-md-12">
                            <label for="gradeLevelTaught" class="form-label">Grade Level Taught <small class="text-danger">*</small></label>
                            <select name="gradeLevelTaught" class="form-select gradeLevelTaught" id="gradeLevelTaught" required>
                                <option selected disabled>Select Grade Level</option>
                                @foreach ($gradeLevel as $key=>$level)
                                    <option value="{{$level->id}}">{{$level->gradeLevelName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="sectionTaught" class="form-label">Section Advisory <small class="text-danger">*</small></label>
                            <select name="sectionTaught" id="sectionTaught" class="form-select" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="minPerWeek" class="form-label">Total Actual Teaching Minutes Per Week</label>
                            <input type="number" min="1" class="form-control" name="minPerWeek" id="minPerWeek">
                        </div>
                        <div class="col-md-12">
                            <label for="ancillary" class="form-label">Number of ancillary</label>
                            <input type="number" min="1" class="form-control" name="ancillary" id="ancillary">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-secondary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-datatable/>
