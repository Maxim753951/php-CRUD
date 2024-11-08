<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h1>Categories</h1>
        </div>

        <form method="POST" action="{{ route('category.create') }}">
            @csrf
            <p>Name: <input type="text" name="name" size="20" required/></p>
            <input type="submit" value="Create Category" style=" width: 225px">
        </form>

        <!-- Table to Display Data -->
            @if(count($categories))
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th colspan="2">Do</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th >{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td style='width: 15%'>
                                    <a href="{{ route('category.get', $category->id) }}">Get</a>
                                </td>
                                <td style='width: 15%;'>
                                    <form method="POST" action="{{ route('category.delete', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="margin-top: 15px;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- ./table-responsive-->

                {{-- $users->links() --}}

            @endif

        </div>
@endsection
