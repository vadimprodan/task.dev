<form method="POST" action="{{ route("admin.$name", $item->id) }}" style="display: inline-block">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button name="delete" type="submit" class="btn btn-danger btn-sm">
        <i class="fa fa-btn fa-trash"></i>
    </button>
</form>