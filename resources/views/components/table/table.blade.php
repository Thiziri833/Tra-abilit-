<table class="w-full bg-white">
    <thead>
        <tr class="border-b-2">
            @foreach ($headers as $header)
            <th class="px-2 py-2 text-left">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
