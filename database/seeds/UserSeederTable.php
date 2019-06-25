<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        factory(User::class,100)->create();
    }
}
