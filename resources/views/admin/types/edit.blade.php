@extends(('admin.types.layouts.create-or-edit'))

@section('page-title')
    Edit type
@endsection

@section('form-action')
    {{route('admin.types.update', $type)}}
@endsection

@section('form-method')
    @method("PUT")
@endsection
