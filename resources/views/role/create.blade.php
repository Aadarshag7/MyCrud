@extends('layouts.app')

@section('title','Create Product')

@section('contents')
 <h1 class="mb-0">Add Role</h1>
 <hr />
 <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="col">
            <input type="checkbox" name="permissions" class="form-control" placeholder="Permission"></textarea>
        </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
