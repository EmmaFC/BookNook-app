<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'title' => $this->faker->name(),
            'author' => $this->faker->name(),
            'year' => $this->faker->year(),
            'genre' => $this->faker->name(),
            'cover' => 'https://picsum.photos/200/300',
            'pages' => $this->faker->numberBetween(80,525),
            'description' => $this->faker->text(),
            'collection' => $this->faker->name(),
            'publishing_house' => $this->faker->name(),
            'edition' => $this->faker->numberBetween(1,50),

        ];
    }
}
