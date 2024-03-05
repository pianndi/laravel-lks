<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title'=>$this->faker->sentence().'?',
           'quiz_id'=>mt_rand(1,20),
           'choice_1'=>$this->faker->sentence(),  
           'choice_2'=>$this->faker->sentence(),  
           'choice_3'=>$this->faker->sentence(),  
           'choice_4'=>$this->faker->sentence(),  
           'choice_5'=>$this->faker->sentence(),  
           'answer'=>mt_rand(1,5),  
        ];
    }
}
