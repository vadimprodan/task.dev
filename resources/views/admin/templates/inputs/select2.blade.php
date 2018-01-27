@section('head')
    @parent
    <!-- Select2 CSS -->
    <link href="{{ url('css/select2.min.css') }}" rel="stylesheet" />
@endsection
@php
    if (!isset($multiple)) $multiple = false;
    if (!isset($foreign)) $foreign = 'id';
    if ($multiple) {
        if (!isset($selected)) {
            if (!isset($pluck)) $pluck = 'id';
            $selected = $item->{ $relation }->pluck($pluck);
        }
    }
@endphp

<div class="form-group">
    <select class="form-control select2" name="{{ $column_name }}{{ ($multiple) ? '[]' : null }}"{{ ($multiple) ? ' multiple' : null }}>
        <option></option>
        @foreach($model as $entry)
            <option
                @if ($item)
                    @if ($multiple)
                        @if ($selected->search($entry->{ $foreign }) !== false)
                            selected
                        @endif
                    @else
                        @if ($entry->{ $foreign } == $item->{ $column_name })
                            selected
                        @endif
                    @endif
                @endif
                value="{{ $entry->{ $foreign } }}">{{ $entry->{ $model_column } }}</option>
        @endforeach
    </select>
</div>
@push('scripts')
    <!-- Select2 JS -->
    <script src="{{ url('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select a {{ strtolower($name) }}"
            });
        });
    </script>
@endpush