<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    protected $categories = [
        [
            'name' => 'Brandy',
            'image_path' => 'categories/brandy.jpg',
        ],
        [
            'name' => 'Gin',
            'image_path' => 'categories/gin.jpg',
        ],
        [
            'name' => 'Rum',
            'image_path' => 'categories/rum.jpg',
        ],
        [
            'name' => 'Tequila',
            'image_path' => 'categories/tequila.jpg',
        ],
        [
            'name' => 'Vodka',
            'image_path' => 'categories/vodka.jpg',
        ],
        [
            'name' => 'Whiskey',
            'image_path' => 'categories/whiskey.jpg',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->init();

        foreach($this->categories as $key => $category):
            $data = [
                'name' => $category['name'],
                'image_path' => $category['image_path'],
            ];

            $this->write($data);
        endforeach;
    }

    private function init()
    {
        Category::truncate();
    }

    private function write($data)
    {
        \DB::beginTransaction();
            Category::create($data);
        \DB::commit();
    }
}
