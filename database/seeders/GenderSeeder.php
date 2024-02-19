<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $genders = ['Male', 'Female'];
        foreach ($genders as $value) {
            $g = new Gender();
            $g->gender_desc = $value;
            $g->save();
        }
    }
}
