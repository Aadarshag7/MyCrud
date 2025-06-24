@extends('layouts.app')

@section('title','Create Teacher')

@section('contents')
 <h1 class="mb-0">Add Teacher</h1>
 <hr />
 <form action="{{route('teacher.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name">
            @error('name')
      <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        <div class="col">
            <input type="number" name="age" class="form-control" placeholder="Age">
            @error('dob')
      <span class="text-danger">{{$message}}</span>
    @enderror
        </div>
        <div class="col">
            <input type="file" name="photo" >
        </div>
        </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
