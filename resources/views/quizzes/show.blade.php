

@extends('layouts.app')

@section('content')
    <h2>{{ $quiz->name }}</h2>

    <form action="{{ route('quizzes.submit', $quiz) }}" method="post">
        @csrf
        @foreach($quiz->questions as $question)
            <div>
                <p>{{ $question->text }}</p>
                @foreach($question->answers as $answer)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                        {{ $answer->text }}
                    </label>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Submit Quiz</button>
    </form>
@endsection
