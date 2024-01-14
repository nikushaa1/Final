<?php


namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'main_photo' => $this->faker->imageUrl(),
            'number_of_questions' => $this->faker->numberBetween(5, 20),
            'added_date' => $this->faker->date,
        ];
    }
}
