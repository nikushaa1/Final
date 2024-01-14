

@extends('layouts.app')

@section('content')
    <h2>Quiz Platform</h2>

    <div>
        <label for="quizDates">Select Quiz Date:</label>
        <select id="quizDates">

            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->added_date }}">{{ $quiz->added_date }}</option>
            @endforeach
        </select>
    </div>


    <div>
        <h3>Available Quizzes</h3>
        @forelse($quizzes as $quiz)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h4>{{ $quiz->name }}</h4>
                <p>Main Photo: <img src="https://metamug.com/article/images/api-integration/create-rest-api-in-php.jpg" alt="{{ $quiz->name }} Photo" style="max-width: 200px;"></p>
                <p>Number of Questions: {{ $quiz->number_of_questions }}</p>
                <a href="{{ route('quizzes.show', $quiz) }}">Start Quiz</a>
            </div>
        @empty
            <p>No quizzes available.</p>
        @endforelse
    </div>
@endsection
