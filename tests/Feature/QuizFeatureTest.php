<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Quiz;

class QuizFeatureTest extends TestCase
{
    public function test_authenticated_user_can_create_quiz()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $quizData = [
            'name' => 'Test Quiz',
            'main_photo' => 'https://www.google.com/search?q=php+photo&rlz=1C1GCEU_enGE1048GE1048&oq=php+photo&gs_lcrp=EgZjaHJvbWUyCQgAEEUYORiABDIHCAEQABiABDIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiABNIBCDcyMDVqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8#vhid=t2jOsq6dE_nFvM&vssid=l',
            'number_of_questions' => 5,
            'added_date' => now(),
            'description' => 'A test quiz for feature testing.',
        ];

        $this->post('/quizzes', $quizData);

        $this->assertDatabaseHas('quizzes', ['name' => 'Test Quiz']);
    }

    // Add more feature tests as needed
}
