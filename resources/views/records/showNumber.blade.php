<h2>Phone Number:</h2>

@foreach ($data as $contact)
    @if ($contact !== "Not found")
        {{ $contact }}<br>
    @endif
@endforeach