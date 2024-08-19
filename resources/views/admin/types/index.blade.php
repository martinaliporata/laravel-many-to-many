@extends('layouts.admin')

@section("page-title", "List of all types")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>{{$type->colour}}</td>
                        <td>
                            <a href="{{route('admin.types.show', $type)}}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{route('admin.types.edit', $type)}}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$types->links()}}
    </div>
</div>
@endsection
