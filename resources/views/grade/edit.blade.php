@extends("dashboard")
@section("content")
Edit Grade
@endsection
@section("form")
<form action="{{ route('grade.update', $grade->id) }}" method="POST" id="editGradeForm">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <div class="form-group">
            <label for="student_name">Student</label>
            <input type="text" class="form-control" name="student_name" id="address" value="{{$grade->student->name}}" required readonly>
        </div>
        <div class="form-group">
            <label for="subject_name">Subject</label>
            <input type="text" class="form-control" name="subject_name" id="subject_name" value="{{$grade->subject->subjectName}}" readonly required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <!-- NOTE: this is set to type=text as type=number seems to be problematic -->
            <input type="text" class="form-control" name="grade" id="grade" value="{{old('grade') ?? $grade->grade}}" required>
            <x-b-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
