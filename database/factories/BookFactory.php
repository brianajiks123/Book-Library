<?php

namespace Database\Factories;

use App\Models\{
    Book,
    Category
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'publication_date' => $this->faker->date(),
            'publisher' => $this->faker->company,
            'pages' => $this->faker->numberBetween(50, 500),
            'category_id' => Category::factory(),
        ];
    }
}
