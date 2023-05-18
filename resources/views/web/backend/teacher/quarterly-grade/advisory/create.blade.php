<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Grade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('teacher.save-quarterly-grade.by-advisory') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select school_year" required aria-label="select example"
                                    name="school_year">
                                    @foreach ($sessions as $key => $session)
                                        <option {{ $session->status == 1 ? 'selected' : 'disabled' }}
                                            value="{{ $session->school_year }}"
                                            {{ $session->status == 2 ? 'class=not-available' : '' }}>
                                            {{ $session->school_year }}
                                            {{ $session->status == 2 ? '--Not Available--' : '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <select class="form-select school_year" required aria-label="select example"
                                    name="student_id">
                                    @foreach ($students as $key => $student)
                                        <option value="{{ $student->studentId }}">
                                            {{ $key + 1 }}{{ '. ' . $student->lastname . ', ' . $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Learning Areas</th>
                                            <th>Q1</th>
                                            <th>Q2</th>
                                            <th>Q3</th>
                                            <th>Q4</th>
                                            <th>Final Grades</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr class="subject_{{ $subject->id }}">
                                                <td>{{ $subject->subjectName }}</td>
                                                <td><input type="number" min="1" name="quarter1[]"
                                                        class="quarter"></td>
                                                <td><input type="number" min="1" name="quarter2[]"
                                                        class="quarter"></td>
                                                <td><input type="number" min="1" name="quarter3[]"
                                                        class="quarter"></td>
                                                <td><input type="number" min="1" name="quarter4[]"
                                                        class="quarter"></td>
                                                <td class="final-grade"></td>
                                                <td class="remarks"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
