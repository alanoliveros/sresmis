<div class="modal fade" id="addstudent_click" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable add-student " role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header text-dark">
                <h1 class="modal-title fs-5 ">Student Personal Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sresmis.teacher.add-student') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">School Year <small
                                    class="text-danger">(required)</small> </label>
                            <select name="schoolYearId" id="" class="form-select">
                                @foreach ($sessions as $key => $year)
                                    <option {{ $key == 0 ? 'selected' : '' }} value="{{ $year->school_year }}">
                                        {{ $year->school_year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Learning Modality<small
                                    class="text-danger">(required)</small> </label>
                            <select name="learning_mode_id" id="" class="form-select">
                                @foreach ($learnings as $key => $learning)
                                    <option {{ $key == 0 ? 'selected' : '' }} value="{{ $learning->id }}">
                                        {{ $learning->mode_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">LRN <small
                                    class="text-danger">(required)</small> </label>
                            <input type="number" min="1" class="form-control" name="studentLrn">
                        </div>
                        {{-- personal information of student --}}
                        <div class="col-md-12">
                            <label for="validationDefault01" class="form-label">First name <small
                                    class="text-danger">(required)</small></label>
                            <input type="text" class="form-control" name="firstName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Middle name</label>
                            <input type="text" class="form-control" name="middleName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Last name <small
                                    class="text-danger">(required)</small></label>
                            <input type="text" class="form-control" name="lastName">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="suffix">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" name="birthdate">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Age</label>
                            <input type="number" min="1" class="form-control" name="age">
                        </div>


                        @if (
                            $grades->gradeLevelName == 'Grade I' ||
                                $grades->gradeLevelName == 'Grade II' ||
                                $grades->gradeLevelName == 'Grade III')
                            <div class="col-md-12">
                                <label for="validationDefault02" class="form-label">Mother tongue</label>
                                <input type="text" class="form-control" name="mothertongue">
                            </div>
                        @endif

                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Ethnic Group</label>
                            <input type="text" class="form-control" name="ethnicgroup">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Religion</label>
                            <input type="text" class="form-control" name="religion">
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


                        <hr>

                        <span class="text-center">Parent or Guardian Information <small
                                class="text-danger">(optional)</small></span>
                        <hr>


                        <!-- Father -->
                        <div class="col-md-12">
                            <label for="">Father</label>
                            <input type="text" class="form-control" name="fathersFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="fathersMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="fathersLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="fathersSuffix" placeholder="Suffix">
                        </div>
                        <!-- end Father -->

                        <!-- Mother -->
                        <div class="col-md-12">
                            <label for="">Mother</label>
                            <input type="text" class="form-control" name="mothersFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="mothersMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="mothersLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="mothersSuffix" placeholder="Suffix">
                        </div>
                        <!-- end Mother -->

                        <!-- Guardian -->
                        <div class="col-md-12">
                            <label for="">Guardian</label>
                            <input type="text" class="form-control" name="gurdiansFirstName"
                                placeholder="First name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="gurdiansMiddleName"
                                placeholder="Middle name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="gurdiansLastName"
                                placeholder="Last name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="gurdianssuffix" placeholder="Suffix">
                        </div>
                        <div class="col-md-12">
                            <label for="">Relationship to student</label>
                            <input type="text" class="form-control" name="relationship">
                        </div>
                        <div class="col-md-12">
                            <label for="">Contact Number of Parent or Guardian</label>
                            <input type="number" class="form-control" name="contactNumber">
                        </div>
                        <!-- end Guardian -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
