@extends('layouts.app')

@section('title','Create Student')

@section('contents')
 <h1 class="mb-0">Add Student</h1>
 <hr />
 <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name">
            @error('name')
      <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        <div class="col">
            <input type="date" name="dob" class="form-control" placeholder="DOB">
            @error('dob')
      <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        <div class="row mb-3">
        <div class="col">
            <h5 class="col">Section </h5>
            <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
        </div>
        <div class="col">
            <input type="file" name="photo[]" multiple>
        </div>
        </div>
        <div class="col">
            <input type="text" name="grade_id" class="form-control" placeholder="Grade ">
            <select name="grade_id" id="grade_id" class="form-select">
        <option value="">select a grade</option>
        @foreach($grade as $gradee)
            <option value="{{$gradee->id}}">{{$gradee->title}}</option>
        @endforeach 
    </select>
        </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
