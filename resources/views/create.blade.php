@extends('layouts.app')

@section('content')
    <h1>{{ $page }}</h1>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <label for="rating">Rating (1-5)</label>
        <input type="number" name="rating" min="1" max="5" required>

        <label for="review_text">Review (optional)</label>
        <textarea name="review_text" maxlength="500"></textarea>

        <button type="submit">Submit Review</button>
    </form>
@endsection