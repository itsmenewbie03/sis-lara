@extends("dashboard")
@section("content")
Edit Student
@endsection
@section("form")
<form action="{{ route('student.update', $student->id) }}" method="POST" id="editUserForm">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$student->address}}" required>
        </div>

        <div class="form-group">
            <label for="address">Age</label>
            <input type="number" min="1" class="form-control" name="age" id="age" value="{{$student->age}}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
