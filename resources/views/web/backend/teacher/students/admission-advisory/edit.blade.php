<div class="modal fade editStudentModal" id="addstudent_click" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable add-student" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header text-dark">
                <h1 class="modal-title fs-5 ">Student Personal Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacher.add-student') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">LRN <small
                                    class="text-danger"> (required)</small> </label>
                            <input type="hidden" min="1" class="form-control studentId" name="studentId">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">School Year <small
                                    class="text-danger"> (required)</small> </label>
                            <select name="schoolYearId" id="" class="form-select school_year">
                                @foreach ($sessions as $key => $year)
                                    <option {{ $year->status == 1 ? 'selected' : 'disabled' }} value="{{ $year->school_year }}">
                                        {{ $year->school_year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Learning Modality<small
                                    class="text-danger"> (required)</small> </label>
                            <select name="learning_mode" id="" class="form-select learning_modality">
                                @foreach ($learnings as $key => $learning)
                                    <option {{ $key == 0 ? 'selected' : '' }} value="{{ $learning->mode_name }}">
                                        {{ $learning->mode_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Current Status<small
                                    class="text-danger"> (required)</small> </label>
                            <select name="enrollment_status" id="" class="form-select enrollment_status">
                                <option value="1" selected>Regular</option>
                                <option value="2">Transferee</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">LRN <small
                                    class="text-danger"> (required)</small> </label>
                            <input type="number" min="1" class="form-control lrn" name="studentLrn">
                        </div>
                        {{-- personal information of student --}}
                        <div class="col-md-12">
                            <label for="validationDefault01" class="form-label">First name <small
                                    class="text-danger"> (required)</small></label>
                            <input type="text" class="form-control name" name="firstName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Middle name</label>
                            <input type="text" class="form-control middlename" name="middleName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Last name <small
                                    class="text-danger"> (required)</small></label>
                            <input type="text" class="form-control lastname" name="lastName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Suffix</label>
                            <input type="text" class="form-control suffix" name="suffix">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Gender</label>
                            <select name="gender" class="form-select gender" id="">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Birth Date</label>
                            <input type="date" class="form-control birth_date" name="birthdate">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Age</label>
                            <input type="number" min="1" class="form-control age" name="age">
                        </div>
                
                
                        @if (
                            $grades->gradeLevelName == 'Grade I' ||
                                $grades->gradeLevelName == 'Grade II' ||
                                $grades->gradeLevelName == 'Grade III')
                            <div class="col-md-12">
                                <label for="validationDefault02" class="form-label">Mother tongue</label>
                                <input type="text" class="form-control mothertongue" name="mothertongue">
                            </div>
                        @endif
                
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Ethnic Group</label>
                            <input type="text" class="form-control ethnicgroup" name="ethnicgroup">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Religion</label>
                            <input type="text" class="form-control religion" name="religion">
                        </div>
                        
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Address </label>
                            <input type="text" class="form-control purok" name="purok" placeholder="Strt/Purok">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control barangay" name="barangay" placeholder="Barangay">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control city" name="city" placeholder="City">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control province" name="province" placeholder="Province">
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control zipcode" name="zipCode" placeholder="Zip code">
                        </div>
                
                
                        <hr>
                
                        <span class="text-center">Parent or Guardian Information <small
                                class="text-danger"> (optional)</small></span>
                        <hr>
                
                
                        <!-- Father -->
                        <div class="col-md-12">
                            <label for="">Father</label>
                            <input type="text" class="form-control fathersFirstName" name="fathersFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control fathersMiddleName" name="fathersMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control fathersLastName" name="fathersLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control fathersSuffix" name="fathersSuffix" placeholder="Suffix">
                        </div>
                        <!-- end Father -->
                
                        <!-- Mother -->
                        <div class="col-md-12">
                            <label for="">Mother</label>
                            <input type="text" class="form-control mothersFirstName" name="mothersFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control mothersMiddleName" name="mothersMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control mothersLastName" name="mothersLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control mothersSuffix" name="mothersSuffix" placeholder="Suffix">
                        </div>
                        <!-- end Mother -->
                
                        <!-- Guardian -->
                        <div class="col-md-12">
                            <label for="">Guardian</label>
                            <input type="text" class="form-control guardiansFirstName" name="guardiansFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control guardiansMiddleName" name="guardiansMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control guardiansLastName" name="guardiansLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control guardiansSuffix" name="guardiansSuffix" placeholder="Suffix">
                        </div>
                        <!-- end Guardian -->
                
                        <hr>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary rounded-0 btnEditStudent">Submit Form</button>
                    </div>
                </form>
                
                
                
            </div>
        </div>
    </div>
</div>
