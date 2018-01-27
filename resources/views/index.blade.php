@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Classes
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('tr[data-id]').click(function() {
            window.location = '{{ url('class') }}/' + $(this).data('id');
        });
    </script>
@endpush