@extends("dashboard")
@section("content")
Grades Dashboard
@endsection
@section("table")

<!-- HACK: toggle the modal on refresh if there are any errors -->
@if($errors->any())
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('#addGradeModal').modal('show');
    });
</script>
@endif

<div class="modal" tabindex="-1" role="dialog" id="addGradeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include("components.forms.add-grade");
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addGradeModal">Add</button>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Subject Code</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grades as $grade)
        <tr>
            <td>{{$grade->id}}</td>
            <td>{{$grade->student->name}}</td>
            <td>{{$grade->subject->subjectCode}}</td>
            <td>{{$grade->grade}}</td>
            <td>
                <div class="d-flex">

                    <form method="POST" action={{route("grade.destroy",$grade->id)}}>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Grade">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </form>
                    <a href="{{route('grade.edit',$grade->id)}}" class="ml-1 btn btn-primary" data-toggle="tooltip" title="Edit Grade">
                        <i class="fas fa-user-edit"></i>
                    </a>


                </div>
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
