@extends(('admin.types.layouts.create-or-edit'))

@section('page-title')
    Create a new type
@endsection

@section('form-action')
    {{route('admin.types.store', $type)}}
@endsection

@section('form-method')
    @method("POST")
@endsection
