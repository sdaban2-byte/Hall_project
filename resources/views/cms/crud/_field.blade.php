@php
    $type = $field['type'] ?? 'text';
    $value = old($name, isset($item) ? $item->{$name} : '');
@endphp
<div class="col-md-12 mb-3">
    <label class="form-label" for="{{ $name }}">{{ $field['label'] ?? $name }}</label>

    @if($type === 'textarea')
        <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="4">{{ $value }}</textarea>
    @elseif($type === 'boolean')
        <select class="form-control" id="{{ $name }}" name="{{ $name }}">
            <option value="1" {{ (string)$value === '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ (string)$value === '0' ? 'selected' : '' }}>No</option>
        </select>
    @elseif($type === 'status')
        <select class="form-control" id="{{ $name }}" name="{{ $name }}">
            @foreach(['pending','accepted','rejected','cancelled'] as $status)
                <option value="{{ $status }}" {{ $value == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    @elseif($type === 'select')
        <select class="form-control" id="{{ $name }}" name="{{ $name }}">
            <option value="">Choose {{ $field['label'] ?? $name }}</option>
            @php($options = ${$field['options']})
            @foreach($options as $option)
                <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }}>
                    {{ $option->{$field['option_label']} }}
                </option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">
    @endif

    @error($name)
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
