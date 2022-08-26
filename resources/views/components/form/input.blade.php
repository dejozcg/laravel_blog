@props(['name'])
<div class="form-group">
    <x-form.label name="{{ $name }}" />
    <input {{ $attributes(['value' => old($name)]) }} name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="" aria-describedby="helpId">
    <x-form.error name="{{ $name }}" />
</div>