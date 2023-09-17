// Create a new Blade component (e.g., resources/views/components/icon.blade.php)
<!-- resources/views/components/icon.blade.php -->

@props(['name'])

@php
    $svgContent = file_get_contents(resource_path("icons/{$name}.svg"));
@endphp

<i {!! $attributes->merge(['class' => '']) !!}>{!! $svgContent !!}</i>
