<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologiesData = [
            [
                "name" => "PHP",
                "color" => "#787CB5"
            ],
            [
                "name" => "Laravel",
                "color" => "#FF2D20"
            ],
            [
                "name" => "Javascript",
                "color" => "#F7DF1E"
            ],
            [
                "name" => "HTML",
                "color" => "#E34C26"
            ],
            [
                "name" => "CSS",
                "color" => "#1572B6"
            ],
            [
                "name" => "Python",
                "color" => "#306998"
            ],
            [
                "name" => "Django",
                "color" => "#092E20"
            ],
            [
                "name" => "React",
                "color" => "#61DAFB"
            ],
            [
                "name" => "Vue.js",
                "color" => "#42B883"
            ],
            [
                "name" => "Angular",
                "color" => "#DD0031"
            ],
            [
                "name" => "Node.js",
                "color" => "#339933"
            ],
            [
                "name" => "Express",
                "color" => "#000000"
            ],
            [
                "name" => "Ruby",
                "color" => "#CC342D"
            ],
            [
                "name" => "Rails",
                "color" => "#CC0000"
            ],
            [
                "name" => "Java",
                "color" => "#007396"
            ],
            [
                "name" => "Spring",
                "color" => "#6DB33F"
            ],
            [
                "name" => "SQL",
                "color" => "#4479A1"
            ],
            [
                "name" => "MongoDB",
                "color" => "#47A248"
            ],
            [
                "name" => "Docker",
                "color" => "#2496ED"
            ],
            [
                "name" => "Kubernetes",
                "color" => "#326CE5"
            ]
        ];

        foreach ($technologiesData as $technologyData){
            // con le fillable
            Technology::create($technologyData);
        }
    }
}
