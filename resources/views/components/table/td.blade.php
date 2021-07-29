@props(['align' => 'left'])

@php
	$textAlignClass = (new App\Support\TextAlignment($align))->className();
@endphp

<td class="p-2 {{ $textAlignClass }}">
	{{ $slot }}
</td>
