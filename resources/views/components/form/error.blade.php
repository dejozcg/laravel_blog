@props(['name'])

@error($name)
<small id="helpId" class="text-muted">{{ $message }}</small>
@enderror