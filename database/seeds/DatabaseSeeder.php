<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('quanlys')->delete();

       DB::table('quanlys')->insert([
            'name' => 'Quanly',
            'email' => 'quanly@cest.com',
            'password' => bcrypt('123456'),
        ]);    }

}