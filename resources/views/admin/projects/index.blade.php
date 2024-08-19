@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Technology</th>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Image</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        {{-- fa quello che gli dico qui dentro se ci sono le cose, sennò fa l'altro - è un if insieme al foreach --}}
                        <td>
                            @forelse ($project->technologies as $technology)
                                <span class="badge rounded-pill" style="background-color: {{$technology->color}}">
                                    {{$technology->name}}
                                </span>
                            @empty
                                <span>
                                    No technologies
                                </span>
                            @endforelse
                        </td>
                        <td>{{$project->id}}</td>
                        <td>{{$project->type->name}}</td>
                        <td>{{$project->technology}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->author}}</td>
                        <td>{{$project->date}}</td>
                        <td>{{$project->preview}}</td>
                        <td>{{$project->image}}</td>
                        <td>
                            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$projects->links()}}
    </div>
</div>
@endsection
