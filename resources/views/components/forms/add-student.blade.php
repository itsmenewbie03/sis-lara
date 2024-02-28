<form method="post" action={{route("student.store")}}>
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" min="1" class="form-control" id="age" name="age" placeholder="Enter age" required>
    </div>
    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
