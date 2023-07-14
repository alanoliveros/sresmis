<div class="modal fade" id="add-section" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form action="{{route('create-section')}}" method="POST">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-light fs-5">Create Section</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            
                                @csrf
                                <div class="row g-3">
                                    {{-- email password --}}
                                    <div class="col-md-12">
                                        <label for="validationDefault02" class="form-label text-dark">Grade Level <small class="text-danger">(required)</small> </label>
                                        <select name="gradeLevel" class="form-select">
                                                <option>Please select grade level</option>
                                            @foreach ($gradelevel as $level)
                                                <option value="{{$level->id}}">{{$level->gradeLevelName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault02" class="form-label text-dark">Section Name <small class="text-danger">(required)</small></label>
                                        <input type="text" class="form-control" name="sectionName">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary float-end" type="submit">Create</button>
                                    </div>  
                                </div>
                        </div>
                    </div>
                </div>
        </form>
</div>