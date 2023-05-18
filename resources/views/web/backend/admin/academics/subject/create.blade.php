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
                            <label for="validationDefault02" class="form-label text-dark">Subject Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="subjectname" value="{{ old('subjectname') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label text-dark">Grade Level <small
                                    class="text-danger">*</small></label>
                            <select name="gradeLevelId" class="form-select">
                                <option selected disabled>Please select grade level</option>
                                @foreach ($gradelevel as $level)
                                    <option
                                        value="{{ $level->id }}" {{ old('gradeLevelId') == $level->id ? 'selected' : '' }}>{{ $level->gradeLevelName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                          name="description" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div style="position: relative;">
                                <label for="customRangeWrittenWork" class="form-label text-dark">Written Work <small
                                        class="text-danger">*</small></label>
                                <input type="range" class="form-range" min="0" max="100" step="5"
                                       id="customRangeWrittenWork" name="writtenWork" value="{{ old('writtenWork') }}">
                                <span class="selected-value"
                                      style="position: absolute; top: 0; right: 0; font-size: 20px;"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div style="position: relative;">
                                <label for="customRangePerformance" class="form-label text-dark">Performance Task <small
                                        class="text-danger">*</small></label>
                                <input type="range" class="form-range" min="1" max="100" step="1"
                                       id="customRangePerformance" name="performanceTask"
                                       value="{{ old('performanceTask') }}">
                                <span class="selected-value"
                                      style="position: absolute; top: 0; right: 0; font-size: 20px;"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div style="position: relative;">
                                <label for="customRangeAssessment" class="form-label text-dark">Quarterly Assessment
                                    <small class="text-danger">*</small></label>
                                <input type="range" class="form-range" min="1" max="100" step="1"
                                       id="customRangeAssessment" name="quarterlyAssessment"
                                       value="{{ old('quarterlyAssessment') }}">
                                <span class="selected-value"
                                      style="position: absolute; top: 0; right: 0; font-size: 20px;"></span>
                            </div>
                        </div>

                        <script>
                            var rangeWrittenWork = document.getElementById('customRangeWrittenWork');
                            var rangePerformance = document.getElementById('customRangePerformance');
                            var rangeAssessment = document.getElementById('customRangeAssessment');

                            var selectedValueWrittenWork = document.querySelector('#customRangeWrittenWork + .selected-value');
                            var selectedValuePerformance = document.querySelector('#customRangePerformance + .selected-value');
                            var selectedValueAssessment = document.querySelector('#customRangeAssessment + .selected-value');

                            rangeWrittenWork.addEventListener('input', function () {
                                selectedValueWrittenWork.textContent = this.value;
                            });

                            rangePerformance.addEventListener('input', function () {
                                selectedValuePerformance.textContent = this.value;
                            });

                            rangeAssessment.addEventListener('input', function () {
                                selectedValueAssessment.textContent = this.value;
                            });
                        </script>
                        <div class="col-12">
                            <button class="btn btn-primary float-end" type="submit">Create</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
