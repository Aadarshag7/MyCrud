@extends('layouts.app')

@section('title','Edit Section')

@section('contents')
<h1 class="mb-0">Edit Section</h1>
<hr />
<form action="{{route('sections.update', $section->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $section->title }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">grade_id</label>
            <input type="text" name="grade_id" class="form-control" placeholder="Grade Id" value="{{ $section->grade_id }}">
        </div>
            </div>
         <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>   
    </div>
</form>
@endsection