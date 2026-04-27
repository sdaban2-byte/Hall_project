@extends('cms.parent')
@section('title','Edit '.$title)
@section('maintitle','Edit '.$title)
@section('subtitle','Edit')
@section('content')
<div class="app-content"><div class="container-fluid"><div class="card card-info card-outline mb-4">
<form method="POST" action="{{ route($routeName.'.update',$item->id) }}">@csrf @method('PUT')
    <div class="card-body"><div class="row g-3">
        @foreach($fields as $name=>$field)
            @include('cms.crud._field', ['name'=>$name, 'field'=>$field, 'item'=>$item])
        @endforeach
    </div></div>
    <div class="card-footer"><button class="btn btn-primary" type="submit">Update</button> <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary">Index</a></div>
</form>
</div></div></div>
@endsection
