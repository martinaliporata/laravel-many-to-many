@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{$project->id}}:{{$project->title}}</h1>
        <p>
            @forelse ($project->technologies as $technology)
                <span class="badge rounded-pill" style="background-color: {{$technology->color}}">
                    {{$technology->name}},
                </span>
            @empty
                <span>
                    No technologies
                </span>
            @endforelse
        </p>
        <h2 class="d-inline-block px-3" style="background: {{$project->type->colour}}">{{$project->type->name}}</h2>
        <h2>{{$project->date}}</h2>
        <h2>{{$project->author}}</h2>
        <p>{{$project->preview}}</p>
    </div>
    <div>
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary btn-sm">Return to projects' list</a>
        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary btn-sm"> Edit</a>
        <form action="{{route('admin.projects.index')}}" method="POST" class="d-inline-block form-destroyer">
            @method("delete")
            @csrf
            <input type="submit" class="btn btn-warning btn-sm" value="Delete">
        </form>
    </div>
</div>
@endsection
