@extends('layouts.admin')

@section("page-title", "Type chosen")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{$type->id}}:{{$type->name}}</h1>
        <p>
            {{$type->colour}}
        </p>
    </div>
    <div>
        <a href="{{route('admin.types.index')}}" class="btn btn-primary btn-sm">Return to types' list</a>
        <a href="{{route('admin.types.edit', $type)}}" class="btn btn-primary btn-sm"> Edit</a>
        <form action="{{route('admin.types.index', $type)}}" method="POST" class="d-inline-block form-destroyer">
            @method("delete")
            @csrf
            <input type="submit" class="btn btn-warning btn-sm" value="Delete">
        </form>
    </div>
</div>
@endsection
