<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // e mi servono le projects
        $projects = Project::all();
        // mi servono le technologies
        $technologies = Technology::all()->pluck('id');
        foreach ($projects as $project){
            // aggiungi una technology
            $project->technologies()->attach($faker->randomElements($technologies, 3));
        }
    }
}
