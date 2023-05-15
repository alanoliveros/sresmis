<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable add-teacher" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light fs-5">Teacher Personal Information</h1>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.add.users-teacher')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">School Year <small class="text-danger">*</small>
                            </label>
                            <select name="schoolYear" class="form-select" id="">
                                @foreach ($sessions as  $key=>$schoolYear)
                                    <option
                                        {{$key == 0? 'selected':''}} value="{{$schoolYear->school_year}}">{{$schoolYear->school_year}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Email <small class="text-danger">*</small>
                            </label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Password <small class="text-danger">*</small></label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault01" class="form-label">First name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="firstName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Middle name</label>
                            <input type="text" class="form-control" name="middleName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Last name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="lastName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="suffix">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Address </label>
                            <input type="text" class="form-control" name="purok" placeholder="Strt/Purok">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="barangay" placeholder="Barangay">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="city" placeholder="City">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="province" placeholder="Province">
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="zipCode" placeholder="Zip code">
                        </div>

                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Employee number </label>
                            <input type="text" class="form-control" name="employeeNumber">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Fund source</label>
                            <input type="text" class="form-control" name="fundSource">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Degree</label>
                            <input type="text" class="form-control" name="degree">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Major</label>
                            <input type="text" class="form-control" name="major">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Minor</label>
                            <input type="text" class="form-control" name="minor">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Grade Level Taught <small
                                    class="text-danger">*</small></label>
                            <select name="gradeLevelTaught" class="form-select gradeLevelTaught" id="" required>

                                <option selected disabled>Select Grade Level</option>
                                @foreach ($gradeLevel as $key=>$level)
                                    <option value="{{$level->id}}">{{$level->gradeLevelName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Section Taught <small
                                    class="text-danger">*</small></label>
                            <select name="sectionTaught" id="sectionTaught" class="form-select">
                                <option value="" required></option>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Total Actual Teaching Minutes Per
                                Week</label>
                            <input type="number" class="form-control" name="minPerWeek">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Number of ancillary</label>
                            <input type="number" class="form-control" name="ancillary">
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-datatable/>
