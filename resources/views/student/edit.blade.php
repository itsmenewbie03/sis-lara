@extends("dashboard")
@section("content")
Edit Student
@endsection
@section("form")
<form action="{{ route('student.update', $student->id) }}" method="POST" id="editStudentForm">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $student->name}}" required>
            <x-b-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{old('address') ?? $student->address}}" required>
            <x-b-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="form-group">
            <label for="address">Age</label>
            <input type="number" min="1" class="form-control" name="age" id="age" value="{{old('age') ?? $student->age}}" required>
            <x-b-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('student.index')}}">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
