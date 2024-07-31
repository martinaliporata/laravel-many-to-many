@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Technology</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date</th>
                    <th scope="col">Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        {{-- fa quello che gli dico qui dentro se ci sono le cose, sennò fa l'altro - è un if insieme al foreach --}}
                        <td>
                            @forelse ($project->technologies as $technology)
                                {{$technology->name}},
                            @empty
                                <td>
                                    No technologies
                                </td>
                            @endforelse
                        </td>
                        <td>{{$project->id}}</td>
                        <td>{{$project->type->name}}</td>
                        <td>{{$project->title}}</td>
                        <td><em>{{$project->date}}</em></td>
                        <td>{{$project->author}}</td>
                        <td>{{$project->preview}}</td>
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
