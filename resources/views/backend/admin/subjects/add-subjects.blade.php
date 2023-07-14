<div class="modal fade" id="add-subjects" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{route('add-subjectBygradeLevel')}}" method="POST">
            @csrf
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$name}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="{{$id}}" name="gradeLevelId">
                        <div class="col-md-12">
                            <div class="table table-responsive">
                                    <table class="table table-bordered subject_tab">
                                        <thead>
                                            <th>Subject Name</th>
                                            <th>Subject Description <small class="text-danger">(optional)</small></th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="subjectname[]" class="form-control"></td>
                                                <td><input type="text" name="description[]" class="form-control"></td>
                                                <td class="text-center"><button type="button" class="btn btn-dark add_subject">+</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Subject</button>
                    </div>
                </div>
        </form>
    </div>
</div>