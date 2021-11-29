<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'channel_id' => function(){
                return \App\Models\Channel::factory()->create()->id;
            },
            'user_id' => function(){
                return \App\Models\User::factory()->create()->id;
            },
            'title' => $title,
            'body' => $this->faker->paragraph(2),
            'slug' => \Illuminate\Support\Str::slug($title)
        ];
    }
}
