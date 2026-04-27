@extends('cms.parent')
@section('title','Show '.$title)
@section('maintitle','Show '.$title)
@section('subtitle','Show')
@section('content')
<div class="app-content"><div class="container-fluid"><div class="card mb-4"><div class="card-body">
<table class="table table-bordered"><tr><th>ID</th><td>{{ $item->id }}</td></tr>
@foreach($fields as $name=>$field)
<tr><th>{{ $field['label'] ?? $name }}</th><td>{{ $item->{$name} }}</td></tr>
@endforeach
</table>
<a href="{{ route($routeName.'.index') }}" class="btn btn-secondary">Back</a>
</div></div></div></div>
@endsection
