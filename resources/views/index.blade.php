{{-- @extends('Layouts.AppLayout') --}}
@inertia

@section('content')
    <h1>Make a Reservation</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="table_id">Table</label>
        <select name="table_id" required>
            @foreach($tables as $table)
                <option value="{{ $table->id }}">Table #{{ $table->table_number }} ({{ $table->capacity }} seats)</option>
            @endforeach
        </select>

        <label for="reservation_date">Date</label>
        <input type="date" name="reservation_date" required>

        <label for="reservation_time">Time</label>
        <input type="time" name="reservation_time" required>

        <label for="guest_count">Number of Guests</label>
        <input type="number" name="guest_count" required>

        <button type="submit">Reserve</button>
    </form>
@endsection