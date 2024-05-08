<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Articles;

class ArticlesTableSeeder extends Seeder
{
    public function run(): void
    {
        Articles::create([
            'nom'=>'Article1',
            'description'=>'Description1',
            'id_categorie'=>'4',
        ]);

        Articles::create([
            'nom'=>'Article2',
            'description'=>'Description2',
            'id_categorie'=>'4',
        ]);

        Articles::create([
            'nom'=>'Article3',
            'description'=>'Description3',
            'id_categorie'=>'5',
        ]);

        Articles::create([
            'nom'=>'Article4',
            'description'=>'Description4',
            'id_categorie'=>'5',
        ]);

        Articles::create([
            'nom'=>'Article5',
            'description'=>'Description5',
            'id_categorie'=>'6',
        ]);

        Articles::create([
            'nom'=>'Article6',
            'description'=>'Description6',
            'id_categorie'=>'6',
        ]);

        Articles::create([
            'nom'=>'Article7',
            'description'=>'Description7',
            'id_categorie'=>'7',
        ]);

        Articles::create([
            'nom'=>'Article8',
            'description'=>'Description8',
            'id_categorie'=>'7',
        ]);

        Articles::create([
            'nom'=>'Article9',
            'description'=>'Description9',
            'id_categorie'=>'8',
        ]);

        Articles::create([
            'nom'=>'Article10',
            'description'=>'Description10',
            'id_categorie'=>'8',
        ]);

        Articles::create([
            'nom'=>'Article11',
            'description'=>'Description11',
            'id_categorie'=>'9',
        ]);

        Articles::create([
            'nom'=>'Article12',
            'description'=>'Description12',
            'id_categorie'=>'9',
        ]);

        Articles::create([
            'nom'=>'Article13',
            'description'=>'Description13',
            'id_categorie'=>'10',
        ]);

        Articles::create([
            'nom'=>'Article14',
            'description'=>'Description14',
            'id_categorie'=>'10',
        ]);

        Articles::create([
            'nom'=>'Article15',
            'description'=>'Description15',
            'id_categorie'=>'11',
        ]);

        Articles::create([
            'nom'=>'Article16',
            'description'=>'Description16',
            'id_categorie'=>'11',
        ]);

        Articles::create([
            'nom'=>'Article17',
            'description'=>'Description17',
            'id_categorie'=>'12',
        ]);

        Articles::create([
            'nom'=>'Article18',
            'description'=>'Description18',
            'id_categorie'=>'12',
        ]);
    }
}
