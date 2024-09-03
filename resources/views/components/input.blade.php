<div class="col-md-6 my-3">
    <label class="form-label fs-6" for="{{ $field_name }}">{{ $label_name }}</label>
    <input name="{{ $field_name }}" {{$attributes }} placeholder="{{ $placeholder }}" type="text" id="{{ $field_name }}"
        class="form-control" />
    @error(sprintf($field_name) )
        <span class="text-end text-danger">* {{ $message }} </span>
    @enderror
</div>
