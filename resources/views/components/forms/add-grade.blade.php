<form method="post" action={{route("grade.store")}}>
    @csrf
    <div class="form-group">
        <label for="student_id">Student Name</label>
        <select name="student_id" id="student_id" class="form-control" required>
            <option value="" selected disabled>Select a student...</option>
            @foreach($students as $student)
            <option value="{{$student->id}}" @if(old('student_id')==$student->id) selected @endif
                >{{$student->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="subject_id">Subject</label>
        <select name="subject_id" id="student_id" class="form-control" required>
            <option value="" selected disabled>Select subject...</option>
            @foreach($subjects as $subject)
            <option value="{{$subject->id}}" @if(old('subject_id')==$subject->id) selected @endif>{{$subject->subjectName}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter grade" value="{{old('grade')}}" required>
        <x-b-input-error :messages="$errors->get('grade')" class="mt-2" />
    </div>
    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
