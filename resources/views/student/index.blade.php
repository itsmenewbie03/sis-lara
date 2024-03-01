@extends("dashboard")
@section("content")
Student Dashboard
@endsection
@section("table")
<!-- HACK: toggle the modal on refresh if there are any errors -->
@if($errors->any())
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('#addStudentModal').modal('show');
    });
</script>
@endif

<div class="modal" tabindex="-1" role="dialog" id="addStudentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include("components.forms.add-student")
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addStudentModal">Add</button>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->age}}</td>
            <td>
                <form method="POST" action={{route("student.destroy",$student->id)}}>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Student">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </div>
                </form>

                <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Edit Student">
                    <i class="fas fa-user-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push("scripts")
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endpush
