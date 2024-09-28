<form action="{{ route('book.car') }}" method="POST">
    @csrf
    <label for="car">Select Car:</label>
    <select name="car_id">
        @foreach ($cars as $car)
            <option value="{{ $car->id }}">{{ $car->name }} - ${{ $car->price_per_day }} / day</option>
        @endforeach
    </select>
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" required>

    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" required>

    <button type="submit">Book Car</button>
</form>
