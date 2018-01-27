<div class="form-group">
    <div class="image-thumbnail" style="{{ $item && $item->image ? null : "display: none" }}">
        <img class="img-thumbnail" style="height: 164px; width: auto;" {{ $item && $item->{$column_name} ? 'src='.url($url.'/'.$item->{$column_name}) : null }}>
        <i class="fa fa-btn fa-times"{{ $item && $item->{$column_name} ? ' style=display:none;' : null }}></i>
    </div>

    <label id="file_btn" class="btn btn-default" style="{{ isset($item->image) && $item->image ? "display: none" : null }}">
        <i class="fa fa-btn fa-image"></i> Choose {{ $name }}
    </label>

    <input type="file" name="{{ $column_name }}" accept="{{ $accept }}" style="display: none;">
</div>

@push('scripts')
    <script>
        $("input[type=file]").change(function() {
            var filename = $(this).val().replace(/\\/g, '/').replace(/.*\//, '');

            if (filename) {
                $("#file_btn").fadeOut('fast', function() {
                    $(".image-thumbnail").fadeIn('fast');
                });

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.img-thumbnail').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(this.files[0]);
                }

                $("label.btn-file").text(filename);
            }
        });

        $("#file_btn, .img-thumbnail").click(function () {
            $("input[type=file]").trigger('click');
        });

        $('.image-thumbnail>i').click(function() {
            $(".image-thumbnail").fadeOut('fast', function() {
                $("#file_btn").fadeIn('fast');
                $("input[type=file]").val('');
            });
        });
    </script>
@endpush