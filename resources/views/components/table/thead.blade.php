<thead>
    <tr class="border-b-2">
        @foreach ($headers as $header)
            <th class="px-2 py-3 {{ $header['classes'] }}">{{ $header['name'] }}</th>
        @endforeach
    </tr>
</thead>
