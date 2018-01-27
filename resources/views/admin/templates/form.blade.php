@extends('admin.layouts.base')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0 pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <b>
                    @if(!$item)
                        Creating {{ $name }}
                    @else
                        Editing {{ $name }} #{{ $item->id }}
                    @endif
                </b>
            </div>
            <div class="card-body">
                <form id="form" method="POST" action="{{ route("admin.$name") }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {!! ($item) ? "<input name='id' value={$item->id} hidden>" : null !!}

                    @foreach($entries as $name => $entry)
                        @php
                            if (!is_array($entry)) $entry = [];
                            $entry['type'] = isset($entry['type']) ? $entry['type'] : null;
                            $entry['column_name'] = $name;
                        @endphp
                        @includeWhen($entry['type'], "admin.templates.inputs.{$entry['type']}", $entry)
                    @endforeach
                    <input type="submit" hidden>
                </form>
            </div>
            <div class="card-footer">
            @if(Request::is('*edit*') or !$item)
                <button type="button" class="btn btn-{{ $item ? 'primary' : 'success' }} btn-block" style="margin-bottom: 8px" onclick="$('#').trigger('click');">
                    <i class="fa fa-btn fa-{{ $item ? 'save' : 'plus' }}"></i> {{ $item ? 'Save' : 'Create' }}
                </button>
            @endif
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-default btn-block">
                        <i class="fa fa-btn fa-arrow-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
