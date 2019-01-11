<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		//$this->call(TopicsTableSeeder::class);
        Model::unguard();
        $this->call(UsersTableSeeder::class);
		//$this->call(ReplysTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);

        $this->call(TopicsTableSeeder::class);

        $this->call(ReplysTableSeeder::class);
        Model::reguard();
    }
}
