<?php
$name = $attributes['name'];
$value = $attributes['value'];
$label = $attributes['label'];
?>
<div class="mt-3">
    <label for="{{ $name }}" class='form-label'>{{ $label }}</label>
    <select class="form-select" name="{{ $name }}" id="{{ $name }}">
        <option value="">
            <--Chọn 1 giá trị-->
        </option>
        @foreach ($danhmuc as $dm)
            <option value="{{ $dm->id }}">{{ $dm->tendanhmuc }}</option>
        @endforeach
    </select>
</div>
@error($name)
    <p class="text-danger">{{ $message }}</p>
@enderror