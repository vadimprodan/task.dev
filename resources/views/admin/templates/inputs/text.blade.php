<div class="form-group">
    <input type="text" class="form-control" name="{{ $column_name }}" value="{{ old($column_name) ? old($column_name) : ($item ? $item->{$column_name} : null) }}" placeholder="{{ $name }}"{{ (isset($required) and $required) ? ' required' : null }}>
</div>