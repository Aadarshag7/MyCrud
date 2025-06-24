@extends('layouts.app')

@section('title','Home Product')

@section('contents')

 <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Student</h1>
    <a href="{{route('students.create')}}" class="btn btn-primary">Add Student</a>
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
            <th>name</th>
            <th>dob</th>
            <th>section_id</th>
            <th>photo</th>
            <th>grade</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>+
        @if($student->count()>0)
        @foreach($student as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->name}}</td>
            <td class="align-middle">{{ $rs->dob }}</td>
            <td class="align-middle">{{ $rs->section_id }}</td>
            <td class="align-middle">
              @foreach($rs->image as $image)
               <img src="{{asset('storage/'.$image->filename)}}" alt="image" height="200" width="200"> 
              @endforeach
            </td>
             <td class="align-middle">{{ $rs->grade->title }}</td>
              <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('products.show', $rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                     <a href="{{route('products.edit', $rs->id)}}" type="button" class="btn btn-secondary">Edit</a>
                     <form action="{{route('students.destroy' ,$rs->id)}}" method="POST" type="button" class="btn btn-danger">
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