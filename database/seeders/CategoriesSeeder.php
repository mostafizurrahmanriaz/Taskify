<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;

use Nette\Utils\Json;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/categories.json');
        $categories = collect(json_decode($json, true));

        $categories->each(function ($category){
            Category::create([
                "name" => $category['name']
            ]);
        });
    }
}
