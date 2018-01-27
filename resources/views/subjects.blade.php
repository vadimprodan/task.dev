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