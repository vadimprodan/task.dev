@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ $item->name }} class
            </div>
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        @include('students', ['items' => $item->students])
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Subjects</div>
                    <div class="card-body">
                        @include('subjects', ['items' => $item->subjects])
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-default btn-block">
                        <i class="fa fa-btn fa-arrow-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection