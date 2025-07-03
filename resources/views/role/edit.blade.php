@extends('layouts.app')

@section('title','Edit Role')

@section('contents')
<h1 class="mb-0">Edit Role</h1>
<hr />
<form action="{{route('role.update', $role->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $product->title }}">
        </div>
        <div class="col mb-3">
            @foreach $permissions as $permission
            <input type="checkbox" name="" class="form-control" placeholder="Description" value="{{ $product->description }}">
        </div>
            </div>
         <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>   
    </div>
</form>
@endsection