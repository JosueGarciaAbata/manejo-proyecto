<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the model that this factory is for.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDateTime = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDateTime = (clone $startDateTime)->modify('+2 hours');
    
        // Generar tags dinámicos de 3 a 5 palabras y asegurarse que no excedan 100 caracteres
        do {
            $tags = implode(', ', $this->faker->words(rand(3, 5)));
        } while (strlen($tags) > 100);
    
        return [
            'tit_eve' => $this->faker->text(50), // Máximo 50 caracteres
            'des_eve' => $this->faker->paragraph(3) . '<br>' . $this->faker->paragraph(2),
            'fec_pub_eve' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'fec_ini_eve' => $startDateTime,
            'fec_fin_eve' => $endDateTime,
            'tag_eve' => $tags, // Tags generados dinámicamente
            'pre_img' => 'thumbnails/thumb_' . $this->faker->unique()->word . '_preview.jpg',
            'res_img' => 'thumbnails/resized_' . $this->faker->unique()->word . '.jpg',
            'dir_eve' => $this->faker->company . ', ' . $this->faker->city,
        ];
    }
    
    
}
