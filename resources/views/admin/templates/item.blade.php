@extends('admin.layouts.base')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>{{ ucfirst($name) }} #{{ $item->id }}</b>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    @foreach($entries as $column_name => $entry)
                        <label class="control-label">@if(!is_array($entry)) {{ $entry }} @else {{ (isset($entry['name'])) ? $entry['name'] : $column_name }} @endif: </label> {{ $item->{$column_name} }}<br>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-default btn-block">
                        <i class="fa fa-btn fa-arrow-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection