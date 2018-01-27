@extends('admin.layouts.base')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                Success!
            </div>
        @endif
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
            <div class="card-header"> Edit profile </div>
            <div class="card-body">
                <form id="form" method="POST" action="{{ route('admin.profile') }}">
                    {{ csrf_field() }}
                    @include('admin.templates.inputs.text', ['name' => 'Username', 'column_name' => 'username', 'item' => $user])
                    @include('admin.templates.inputs.password', ['name' => 'Password', 'column_name' => 'password', 'item' => $user])
                </form>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 8px"
                        onclick="$('#form').submit();">
                    <i class="fa fa-btn fa-save"></i> Save
                </button>
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-default btn-block">
                        <i class="fa fa-btn fa-arrow-left"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection