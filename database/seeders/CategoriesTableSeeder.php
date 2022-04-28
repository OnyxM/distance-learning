<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'ICT For Development',
            'Allemand', 'Anglais', 'Anthropologie', 'Arts et Archéologie', 'Espagnol', 'Géographie', 'Histoire', 'Langues Africaines et Linguistique',
            'Lettres Bilingues', 'Littérature et Civilisation Africaine', 'Lettres Modernes Françaises', 'Philosophie', 'Psychologie', 'Sciences du Langage',
            'Sociologie', 'Tourisme et Hotellerie',

            'Biochimie', 'Biologie et Physiologie Animales', 'Biologie et Physiologie Végétales', 'Chimie Inorganique', 'Chimie Organique',
            'Informatique', 'Mathématiques', 'Microbiologie', 'Physiques', 'Sciences de la Terre et de l’Univers',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
