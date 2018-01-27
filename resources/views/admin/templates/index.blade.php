@extends('admin.layouts.base')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                        @if(count($items))
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    @foreach($entries as $column_name => $entry)
                                        @if(!isset($entry['hidden']) or !$entry['hidden'])
                                            <th> {{ ( is_array($entry) ) ? $entry['name'] : ucfirst($entry) }} </th>
                                        @endif
                                    @endforeach
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    @foreach($entries as $column_name => $entry)
                                        @if(!isset($entry['hidden']) or !$entry['hidden'])
                                            <td> {{ (is_numeric($column_name)) ? $item->{$entry} : $item->{$column_name} }} </td>
                                        @endif
                                    @endforeach
                                    <td>
                                        @foreach($actions as $action)
                                            @include("admin.templates.actions.$action")
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            Now here empty =(
                            @if($allow_creating)
                                <br />But you can create items =)
                            @endif
                        @endif
                </div>
                @if($pagination)
                    <center>
                        {{ $items->links() }}
                    </center>
                @endif
            </div>
            @if($allow_creating)
                <div class="card-footer">
                    <a href="{{ route("admin.$name_plural.add") }}">
                        <button type="button" class="btn btn-success btn-block">
                            <i class="fa fa-btn fa-plus"></i> Add item
                        </button>
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop

@push('scripts')
    @if(in_array('delete', $actions))
        <script>
            $("button[name=delete]").click(function (e) {
                e.preventDefault();
                if (confirm("Confirm deleting")) $(this).closest("form").submit();
            });
        </script>
    @endif
@endpush