@extends('layouts.app')

@section('title','Create Product')

@section('contents')
 <h1 class="mb-0">Add Product</h1>
 <hr />
 <form action="{{route('player.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="col">
            <input type="number" name="age" class="form-control" placeholder="Age">
        </div>
        <div class="row mb-3">
        <div class="col">
            <input type="file" name="photo" class="form-control" placeholder="Photo">
        </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
