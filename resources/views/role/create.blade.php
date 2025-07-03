@extends('layouts.app')

@section('title','Create Product')

@section('contents')
 <h1 class="mb-0">Add Role</h1>
 <hr />
 <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    

        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="col">
            <h3>Permission</h3>
    @foreach($permissions as $permission)
    
        <div class="form-check">
            <input 
                type="checkbox" 
                name="permissions[]" 
                value="{{ $permission->id }}" 
                class="form-check-input" 
                id="perm_{{ $permission->name }}"
            >
            <label class="form-check-label" for="perm_{{ $permission->name }}">
                {{ $permission->name }}
            </label>
        </div>
    @endforeach
</div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection
