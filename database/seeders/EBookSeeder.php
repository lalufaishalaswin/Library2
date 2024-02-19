<?php

namespace Database\Seeders;

use App\Models\EBook;
use Illuminate\Database\Seeder;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $b = new EBook();
        $b->title = 'Title 1';
        $b->author = 'Author 1';
        $b->description = 'Description 1';

        $b->save();
    }
}
