<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => Str::random(10),
            'description' => Str::random(20),
            'categorie' => Str::random(10),
            'image_url' => Str::random(10),
        ];
    }
}
