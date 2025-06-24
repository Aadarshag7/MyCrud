@extends('layouts.app')

@section('title','Create Grade')

@section('contents')
 <h1 class="mb-0">Add Grade</h1>
 <hr />
 <form action="{{route('grades.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <h3 class="row mb-3">Title</h3>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col">
            <h3 class= "row mb-3">Activity</h3>
            <input type="text" name="activity" class="form-control" placeholder="Activity">
        </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
