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
            <form action="@yield('form-action')" method="POST">
                @yield('form-method')
                @csrf
                <div>
                    <h1>
                        @yield('page-title')
                    </h1>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $type->name) }}">
                </div>
                <div class="mb-3">
                    <label for="colour">Color</label>
                    <input type="color" name="colour" id="colour" class="form-control" value="{{ old('colour', $type->colour) }}">
                </div>
                <input type="submit" value="@yield('page-title')" class="btn btn-primary">
                <input type="reset" value="Reset form" class="btn btn-danger">
            </form>
        </div>
    </div>
</div>
@endsection
