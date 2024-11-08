<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Edit Category</h2>

        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{$category->name}}" name="name" required>
            </div>

            <button type="submit" class="">Edit</button>
        </form>
    </div>

@endsection
