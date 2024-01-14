<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Quiz;

class QuizTest extends TestCase
{
    public function test_quiz_can_be_created()
    {
        $quiz = Quiz::factory()->create();

        $this->assertInstanceOf(Quiz::class, $quiz);
    }

}
