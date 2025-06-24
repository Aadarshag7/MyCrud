@extends('layouts.app')

@section('title','Create Grade')

@section('contents')
 <h1 class="mb-0">Add Grade</h1>
 <hr />
 <form action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <h3 class= "row mb-3"> Title</h3>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="col">
            <h3 class="row mb-3">Grade</h3>
            <input type="text" name="grade_id" class="form-control" placeholder="Grade Id">
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
