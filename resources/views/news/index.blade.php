@extends('layouts.app')

@section('title','Home Product')

@section('contents')

 <div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List News</h1>
    <a href="{{route('news.create')}}" class="btn btn-primary">Add News</a>
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
            <th>Title</th>
            <th>Content</th>
             <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>+
        @if($news->count()>0)
        @foreach($news as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->title }}</td>
            <td class="align-middle">{{ $rs->content}}</td>
            <td class="align-middle">

            @if($rs->categories->count() > 0)
            @foreach($rs->categories as $category)
            {{ $category->name ?? ''}}
            @endforeach
            @endif
            </td>
              <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('products.show', $rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                     <a href="{{route('sections.edit', $rs->id)}}" type="button" class="btn btn-secondary">Edit</a>
                     <form action="{{route('sections.destroy' ,$rs->id)}}" method="POST" type="button" class="btn btn-danger">
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