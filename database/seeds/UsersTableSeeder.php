<?php

use App\User;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'maxtayebwa@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Max BigBudget',
                'email' => 'maxtayebwa@gmail.com',
                'about' => 'Creator Of Things',
                'role' => 'admin',
                'password' => Hash::make('maxondria')
            ]);
        }
    }
}
