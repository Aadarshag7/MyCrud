@extends('layouts.app')

@section('title','Create Grade')

@section('contents')
 <h1 class="mb-0">Add Category</h1>
 <hr />
 <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <h3 class= "row mb-3"> Name</h3>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>
        <div class="col">
            <h3 class="row mb-3">Category</h3>
            <input type="text" name="News" class="form-control" placeholder="News">
            <select name="news_id[]" id="news_id" class="form-select">
        <option value="">select a news</option>
        @foreach($news as $newss)
            <option value="{{$newss->id}}">{{$newss->title}}</option>
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
