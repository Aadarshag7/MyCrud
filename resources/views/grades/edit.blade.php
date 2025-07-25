@extends('layouts.app')

@section('title','Edit Product')

@section('contents')
<h1 class="mb-0">Edit Product</h1>
<hr />
<form action="{{route('grades.update', $grade->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $grade->title }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Activity</label>
            <input type="text" name="activity" class="form-control" placeholder="Activity" value="{{ $grade->price }}">
        </div>
            </div>
         <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>   
    </div>
</form>
@endsection