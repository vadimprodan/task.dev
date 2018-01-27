@php
    if (!isset($foreign)) $foreign = 'id';
@endphp
<div class="form-group">
    <select class="form-control" name="{{ $column_name }}" id="{{ $column_name }}"{{ (isset($required) and $required) ? ' required' : null }}>
        <option {{ $item && $item->type ? null : 'selected ' }}disabled>Choose {{ strtolower($name) }}</option>
        @foreach($model as $entry)
            <option {{ $item && $entry->{ $foreign } == $item->{ $column_name } ? 'selected ' : null }}value="{{ $entry->{ $foreign } }}">{{ $entry->{ $model_column } }}</option>
        @endforeach
    </select>
</div>