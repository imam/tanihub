<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BookCategory::class,10)->create();
        factory(App\Book::class,50)->make()->each(function($b){
            $b->book_category_id = App\BookCategory::all()->random()->id;
            $b->save();
        });
    }
}
