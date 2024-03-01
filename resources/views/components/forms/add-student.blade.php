<form method="post" action={{route("student.store")}}>
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name')}}" required>
        <x-b-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{old('address')}}" required>
        <x-b-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" min="1" class="form-control" id="age" name="age" placeholder="Enter age" value="{{old('age')}}" required>
        <x-b-input-error :messages="$errors->get('age')" class="mt-2" />
    </div>
    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
