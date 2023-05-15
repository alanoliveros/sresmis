<div class="modal fade" id="importsf1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('teacher.import-sf1-excel') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import SF1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <label>
                        <input name="sf1" type="file" hidden />
                        <div class="btn btn-primary rounded-0">Choose Excel File</div>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
