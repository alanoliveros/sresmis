<div class="modal fade" id="add_attendance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 text-light fs-5">Student Attendance</h1>
          <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{route('sresmis.teacher.add-student')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="validationDefault02" class="form-label">School Year <small class="text-danger">(required)</small> </label>
                        <select name="" id="" class="form-select">
                                
                            @foreach ($sessions as $key=>$year)
                                <option value="{{$year->id}}" {{$key == 0? 'selected':''}}>{{$year->school_year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center text-success fs-3 bg-dark text-light">Student Attendance</th>
                                </tr>
                                <tr >
                                
                                    <th class="fw-bold">Student Name</th>
                                    <th class="fw-bold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <th colspan="3" class="fw-bold text-success text-center">MALE</th>
                                        </tr>
                                @foreach ($students as $key=>$student)
                                    @if ($student->gender == 'Male')
                                        <tr>
                                        
                                            <td>{{$student->lastname.', '.$student->name.($student->middlename != NULL? ', '.$student->middlename:'')}}</td>
                                        </tr>
                                    @endif
                                    
                                @endforeach
                                        <tr>
                                            <th colspan="3" class="fw-bold text-success text-center">FEMALE</th>
                                        </tr>
                                @foreach ($students as $key=>$student)
                                    @if ($student->gender == 'Female')
                                        <tr>
                                        
                                            <td>{{$student->lastname.', '.$student->name.($student->middlename != NULL? ', '.$student->middlename:'')}}</td>
                                        </tr>
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>             
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
 
</div>
</div>