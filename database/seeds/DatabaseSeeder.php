<?php

use Illuminate\Database\Seeder;
use App\Event;

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
        factory(Event::class, 10)->create();
    }
}
