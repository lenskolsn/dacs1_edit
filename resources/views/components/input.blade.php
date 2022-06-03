<?php
$name = $attributes['name'];
$value = $attributes['value'];
$type = $attributes['type'] ?? 'text';
$old_value = old($name) ?? $value;
$label = $attributes['label'];
$placeholder = $attributes['placeholder'];
$max = $attributes['max'];
$min = $attributes['min'];
?>

<div class="mt-3">
    <label for="{{ $name }}" class='form-label'>{{ $label }}:</label>
    <input type='{{ $type }}' max="{{ $max }}" min="{{ $min }}" name='{{ $name }}'
        class='form-control @error($name) is-invalid @enderror' id='{{ $name }}' value='{{ $old_value }}'
        placeholder="{{ $placeholder }}">
</div>

@error($name)
    <p class="text-danger">{{ $message }}</p>
@enderror
