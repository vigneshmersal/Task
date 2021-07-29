@props(['align' => 'left'])

@php
	$textAlignClass = (new App\Support\TextAlignment($align))->className();
@endphp

<th class="p-2 {{ $textAlignClass }}">
	{{ $slot }}
</th>
