<div class="form-group">
    <select class="form-control" name="{{ $column_name }}" id="{{ $column_name }}"{{ (isset($required) and $required) ? ' required' : null }}>
        <option {{ $item && $item->type ? null : 'selected ' }}disabled>Choose {{ strtolower($name) }}</option>
        @foreach($model as $id => $entry)
            <option {{ $item && $id == $item->{$column->name} ? 'selected ' : null }}value="{{ $id }}">{{ $entry->{$model_column} }}</option>
        @endforeach
    </select>
</div>