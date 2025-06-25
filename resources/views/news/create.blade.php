@extends('layouts.app')

@section('title','Create News')

@section('contents')
 <h1 class="mb-0">Add Grade</h1>
 <hr />
 <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <h3 class= "row mb-3"> Title</h3>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="row mb-3">
        <div class="col">
            <h3 class= "row mb-3"> Content</h3>
            <input type="text" name="content" class="form-control" placeholder="Content">
        </div>
         <div class="col">
            <h3 class="row mb-3">Category</h3>
            <input type="text" name="category" class="form-control" placeholder="Grade Id">
            <select name="category_id[]" id="category_id" class="form-select">
        <option value="">select a category</option>
        @foreach($category as $categories)
            <option value="{{$categories->id}}">{{$categories->name}}</option>
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
