<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**

     *
     * @return void
     */
    public function run()
    {
        
        Quiz::factory()->count(10)->create();
    }
}
