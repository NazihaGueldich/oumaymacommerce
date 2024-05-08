<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categories;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        Categories::create([
            'nom'=>'Catg1',
        ]);

        Categories::create([
            'nom'=>'Catg2',
        ]);

        Categories::create([
            'nom'=>'Catg3',
        ]);

        Categories::create([
            'nom'=>'SCatg11',
            'id_categorie'=>'1',
        ]);

        Categories::create([
            'nom'=>'SCatg12',
            'id_categorie'=>'1',
        ]);

        Categories::create([
            'nom'=>'SCatg13',
            'id_categorie'=>'1',
        ]);

        Categories::create([
            'nom'=>'SCatg21',
            'id_categorie'=>'2',
        ]);

        Categories::create([
            'nom'=>'SCatg22',
            'id_categorie'=>'2',
        ]);

        Categories::create([
            'nom'=>'SCatg23',
            'id_categorie'=>'2',
        ]);

        Categories::create([
            'nom'=>'SCatg31',
            'id_categorie'=>'3',
        ]);

        Categories::create([
            'nom'=>'SCatg32',
            'id_categorie'=>'3',
        ]);

        Categories::create([
            'nom'=>'SCatg33',
            'id_categorie'=>'3',
        ]);
    }
}
