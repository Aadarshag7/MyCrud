@extends('layouts.app')

@section('title','Home Product')

@section('contents')

 <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Product</h1>
    <a href="{{route('role.create')}}" class="btn btn-primary">Add Role</a>
 </div>
 <hr/>
 @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
 <table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>+
        @if($role->count()>0)
        @foreach($role as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->name }}</td>
              <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('role.show', $rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                     <a href="{{route('products.edit', $rs->id)}}" type="button" class="btn btn-secondary">Edit</a>
                     <form action="{{route('products.destroy' ,$rs->id)}}" method="POST" type="button" class="btn btn-danger">
                        @csrf
                        @method('DELETE')
                     <button class="btn btn-danger m-0">Delete</button>
                </div>
              </td> 
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Product not found</td>
        </tr>
        @endif
    </tbody>
 </table>
 @endsection