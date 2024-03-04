@extends("dashboard")
@section("content")
Subject Dashboard
@endsection
@section("table")

<!-- HACK: toggle the modal on refresh if there are any errors -->
@if($errors->any())
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('#addSubjectModal').modal('show');
    });
</script>
@endif

<div class="modal" tabindex="-1" role="dialog" id="addSubjectModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include("components.forms.add-subject");
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addSubjectModal">Add</button>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{$subject->id}}</td>
            <td>{{$subject->subjectName}}</td>
            <td>{{$subject->subjectCode}}</td>
            <td>
                <div class="d-flex">
                    <form method="POST" action={{route("subject.destroy",$subject->id)}}>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Subject">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </form>
                    <a href="{{route('subject.edit',$subject->id)}}" class="ml-1 btn btn-primary" data-toggle="tooltip" title="Edit Subject">
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
