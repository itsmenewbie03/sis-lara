@extends("dashboard")
@section("content")
Edit Subject
@endsection
@section("form")
<form action="{{ route('subject.update', $subject->id) }}" method="POST" id="editSubjectForm">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <div class="form-group">
            <label for="subjectName">Subject Name</label>
            <input type="text" class="form-control" name="subjectName" id="subjectName" value="{{$subject->subjectName}}" required>
        </div>
        <div class="form-group">
            <label for="subjectCode">Subject Code</label>
            <input type="text" class="form-control" name="subjectCode" id="subjectCode" value="{{$subject->subjectCode}}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
