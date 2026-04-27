@extends('cms.parent')
@section('title',$title)
@section('maintitle',$title)
@section('subtitle','Index')
@section('content')
<div class="app-content"><div class="container-fluid"><div class="card mb-4">
    <div class="card-header"><a href="{{ route($routeName.'.create') }}" class="btn btn-primary">Create new {{ $title }}</a></div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table table-bordered">
            <thead><tr><th class="text-center">ID</th>@foreach($fields as $name=>$field)<th class="text-center">{{ $field['label'] ?? $name }}</th>@endforeach<th class="text-center">Action</th></tr></thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    @foreach($fields as $name=>$field)
                        <td class="text-center">
                            @if(($field['type'] ?? '') === 'select')
                                @php($relation = str_replace('_id','',$name))
                                @if($name === 'hall_owner_id') {{ optional($item->hallOwner)->company_name }}
                                @elseif($name === 'city_id') {{ optional($item->city)->city_name }}
                                @elseif($name === 'hall_id') {{ optional($item->hall)->name }}
                                @elseif($name === 'service_id') {{ optional($item->service)->name }}
                                @elseif($name === 'client_id') {{ optional($item->client)->email }}
                                @else {{ $item->{$name} }} @endif
                            @else
                                {{ $item->{$name} }}
                            @endif
                        </td>
                    @endforeach
                    <td class="text-center"><div class="btn-group">
                        <a href="{{ route($routeName.'.show',$item->id) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-eye-fill"></i></a>
                        <a href="{{ route($routeName.'.edit',$item->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" onclick="confirmDestroy({{ $item->id }}, this)" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3-fill"></i></button>
                    </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
</div></div></div>
@endsection
@section('scripts')
<script>function confirmDestroy(id, reference){ destroy('/cms/admin/{{ $routeName }}/' + id, reference); }</script>
@endsection
