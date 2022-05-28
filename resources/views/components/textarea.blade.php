<?php
$label = $attributes['label'];
$name = $attributes['name'];
$old_value = old($name);
$value = $attributes['value'] ?? $old_value;
$placeholder = $attributes['placeholder']
?>
<div class="form-group purple-border">
    <label for="{{$name}}" class="form-label">{{ $label }}</label>
    <textarea placeholder="{{$placeholder}}" name="{{ $name }}" class="form-control" id="{{$name}}"
        rows="3">{{ $value }}</textarea>
</div>
@error($name)
    <p class="text-danger">Nội dung không được bỏ trống!</p>
@enderror