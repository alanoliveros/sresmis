<div class="modal fade" id="add-subjects" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Subject</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <label for="validationDefault02" class="form-label text-dark">Section<small class="text-danger">(required)</small></label>
                    <select class="form-select" name="" id="">
                            <option value="">Select Section</option>
                        @foreach ($sections as $section)
                            <option value="{{$section->id}}">{{$section->sectionName.' - '.$section->gradeLevelName}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="table-responsive"> 
                <table class="table subject_tab">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="subjectName[]"></td>
                            <td><input type="text" class="form-control" name="description[]"></td>
                            <td><input type="time" class="form-control" name="subject_time[]"></td>
                            <td>clarkkent@mail.com</td>
                            <td><button class="btn btn-primary text-light add_subject">+</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>