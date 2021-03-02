<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Action",
            "Adventure",
            "Comedy",
            "Crime",
            "Drama",
            "Fantasy",
            "Historical",
            "Historical fiction",
            "Horror",
            "Magical realism",
            "Mystery",
            "Paranoid fiction",
            "Philosophical",
            "Political",
            "Romance",
            "Saga",
            "Satire",
            "Science fiction",
            "Social",
            "Speculative",
            "Thriller",
            "Urban",
            "Western",
            "Animation",
        ];
        
        foreach($data as $entry)
        {
            \App\Genre::firstOrCreate([
                'name' => strtolower($entry),
            ], []);
        }
    }
}
