<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // così prendo le categorie; oltre a ciò, devo aggiungere gli id delle categorie con il pluck
        // che restituisci i valori di una determinata chiave (pluck->(id) vuol dire dammi solo gli id)
        $types= Type::all()->pluck('id');
        for($i=0; $i<50; $i++){
            $newProject = new Project();
            // dammi un random che viene dalla tabella types
            $newProject->type_id = $faker->randomElement($types);
            $newProject->title=$faker->realText(40);
            $newProject->author=$faker->name();
            $newProject->date=$faker->dateTimeThisMonth();
            $newProject->preview=$faker->imageUrl(400, 250, 'projects');
            $newProject->save();
        }
    }
}
