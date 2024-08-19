@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if ($errors->any())
                <div class="col-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @yield('form-method')
                @csrf
                <div>
                    <h1>
                        @yield('page-title')
                    </h1>
                </div>
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $project->title)}}">
                </div>
                <div class="mb-3">
                    <label for="preview">Preview</label>
                    <input type="text" name="preview" id="preview" class="form-control" value="{{old('preview', $project->preview)}}">
                </div>
                <div class="mb-3">
                    <label for="image">Image Url</label>
                    <input type="file" name="image" id="image" class="form-control mb-2" required value="{{old('image', $project->image)}}">
                </div>
                <select class="form-select px-3" aria-label="Default select example" name="type_id">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}"{{($type->id == old("type_id, $project->type_id")) ? "selected" : ""}}>{{$type->name}}</option>
                    @endforeach
                </select>
                {{-- per name="technologies[] guarda in storeprojectrequest --}}
                {{-- da rivedere questa parte sotto --}}
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($technologies as $technology)
                        @if($errors->any())
                            <input name="technologies[]" type="checkbox" class="btn-check d-inline-block" id="technology-check- {{$technology->id}}" autocomplete="off" value="{{$technology->id}}" {{in_array($technology->id, old('technologies', [])) ? "checked" : ''}}>
                        @else
                            <input name="technologies[]" type="checkbox" class="btn-check d-inline-block" id="technology-check- {{$technology->id}}" autocomplete="off" value="{{$technology->id}}" {{$project->technologies->contains($technology) ? "checked" : ''}}>
                        @enderror
                        <label class="btn btn-outline-primary" for="technology-check- {{$technology->id}}">{{$technology->name}}</label>
                    @endforeach
                </div>
                <input type="submit" value="@yield('page-title')" class="btn btn-primary">
                <input type="reset" value="Reset form" class="btn btn-danger">
            </form>
        </div>
    </div>
</div>
@endsection
