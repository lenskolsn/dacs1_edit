<?php
$name = $attributes['name'];
$value = $attributes['value'];
$type = $attributes['type'] ?? 'text';
$old_value = old($name) ?? $value;
$label = $attributes['label'];
?>

<div class="mt-3">
    <label for="{{ $name }}" class='form-label'>{{ $label }}:</label>
    <input type='{{ $type }}' name='{{ $name }}' class='form-control @error($name) is-invalid @enderror' id='{{ $name }}' value='{{ $old_value }}'>
</div>

@error($name)
    <p class="text-danger">{{ $message }}</p>
@enderror
