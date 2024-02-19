<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = ['Admin', 'User'];
        foreach ($roles as $value) {
            $g = new Role();
            $g->role_desc = $value;
            $g->save();
        }
    }
}
