<form method="post" action={{route("subject.store")}}>
    @csrf
    <div class="form-group">
        <label for="">Subject Name</label>
        <input type="subjectName" class="form-control" id="subjectName" name="subjectName" aria-describedby="emailHelp" placeholder="Enter subject" required>
    </div>
    <div class="form-group">
        <label for="address">Subject Code</label>
        <input type="subjectCode" class="form-control" id="subjectCode" name="subjectCode" placeholder="Enter subject code" required>
    </div>
    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
