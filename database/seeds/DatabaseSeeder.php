<?php

use Illuminate\Database\Seeder;
use App\Events;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(Events::class, 10)->create();
    }
}
