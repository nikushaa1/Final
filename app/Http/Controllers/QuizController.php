<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{


    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }


    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'main_photo' => 'nullable|url',
            'number_of_questions' => 'required|integer|min:1',
            'added_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Quiz::create($request->all());

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        
        $request->validate([
            'name' => 'required|string',
            'main_photo' => 'nullable|url',
            'number_of_questions' => 'required|integer|min:1',
            'added_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully');
    }

    public function destroy(Quiz $quiz)
    {
        
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }
    
    public function show(Quiz $quiz)
    {

        $quiz->load('questions.answers');

        return view('quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {

        $request->validate([
            'answers.*' => 'required|exists:answers,id',
        ]);

        $score = 0;

        foreach ($quiz->questions as $question) {
            $correctAnswerId = $question->correct_answer_id;
            $selectedAnswerId = $request->input('answers.' . $question->id);

            if ($selectedAnswerId == $correctAnswerId) {
                $score++;
            }
        }

        return view('quizzes.result', compact('score'));
    }
}
