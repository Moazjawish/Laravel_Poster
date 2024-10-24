@props(['error_name' => 'name'])
@error($error_name)
    <p class="text-red-900"> {{$message}}</p>
@enderror
