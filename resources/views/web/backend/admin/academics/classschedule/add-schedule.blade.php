<div class="modal fade" id="add-schedule{{$subject->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{route('class-schedule.store')}}" method="POST">
            @csrf
                <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$section->sectionName.$subject->subjectName. ' - Schedule'}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <input type="hidden" value="{{$section->id}}" name="sectionId">
                                <input type="hidden" value="{{$subject->id}}" name="subjectId">
                                <label for="validationDefault02" class="form-label text-dark">Select Teacher<small class="text-danger">*</small> </label>
                                <select name="teacherId" class="form-control" id="">
                                        <option value="" disabled selected>Please select teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->teacherId}}">{{$teacher->lastname.', '.$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label text-dark">Start Time<small class="text-danger">*</small> </label>
                                <input type="time" class="form-control" name="startTime">
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label text-dark">End Time<small class="text-danger">*</small> </label>
                                <input type="time" class="form-control" name="endTime">
                            </div>

                            <div class="col-md-12">
                                <label for="validationDefault02" class="form-label text-dark">Section Day<small class="text-danger"> (Note: Press hold <u>Ctrl+Left     CLick</u> to select multiple value)</small></label>
                               <select name="scheduleDay[]" multiple  style="width:100%; height:100%">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if (count($teachers) > 0)
                        <button type="submit" class="btn btn-primary">Add Subject</button>
                        @else
                        <button type="button" disabled class="btn btn-danger text-light">No data for teacher</button>
                        @endif
                    </div>
                </div>
        </form>
    </div>
</div>
