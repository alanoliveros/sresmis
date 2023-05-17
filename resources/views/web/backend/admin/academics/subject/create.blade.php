<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable" role="document">

        <form action="{{route('admin.create-subject')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-light fs-5">Create Subject</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Grade Level <small class="text-danger">*</small></label>
                            <select name="gradeLevelId" class="form-select">
                                <option selected disabled>Please select grade level</option>
                                @foreach ($gradelevel as $level)
                                    <option value="{{ $level->id }}" {{ old('gradeLevelId') == $level->id ? 'selected' : '' }}>{{ $level->gradeLevelName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Subject Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="subjectname" value="{{ old('subjectname') }}">
                        </div>

                        {{--<div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Section Name <small
                                    class="text-danger">*</small></label>
                            <select name="gradeLevelId" class="form-select gradeLevelTaught" id="" required>
                                <option selected disabled>Select Grade Level</option>
                                @foreach ($gradelevel as $level)
                                    <option value="{{ $level->id }}" {{ old('gradeLevelId') == $level->id ? 'selected' : '' }}>{{ $level->gradeLevelName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label">Section Taught <small
                                    class="text-danger">*</small></label>
                            <select name="sectionTaught" id="sectionTaught" class="form-select">
                                <option value="" required></option>
                            </select>
                        </div>--}}



                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Description <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Written Work <small class="text-danger">*</small></label>
                            <input type="number" min="1" class="form-control" name="writtenWork" value="{{ old('writtenWork') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Performance Task <small class="text-danger">*</small></label>
                            <input type="number" min="1" class="form-control" name="performanceTask" value="{{ old('performanceTask') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Quarterly Assessment <small class="text-danger">*</small></label>
                            <input type="number" min="1" class="form-control" name="quarterlyAssessment" value="{{ old('quarterlyAssessment') }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary float-end" type="submit">Create</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
