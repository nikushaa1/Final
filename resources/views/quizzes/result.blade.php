@extends('layouts.app')

@section('content')
    <main>
        <h2>Quiz Result</h2>

        <div>
            <p>User: {{ $user->name }}</p>
            <p>Score: {{ $score }} / {{ $totalQuestions }}</p>
            <p>Time Taken: {{ $timeTaken }} seconds</p>

        </div>


    </main>
@endsection