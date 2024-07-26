<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Using ORM Eloquent
        $user = new User;
        $user->document = '1053872476';
        $user->fullname = 'Jeimy Pinto';
        $user->gender = 'Female';
        $user->birthdate = '1999-09-13';
        $user->photo= 'profile1.png';
        $user->phone = '3058122481';
        $user->email = 'jeimytatianapinto@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        $user = new User;
        $user->document = '1002633713';
        $user->fullname = 'Willy Pinto';
        $user->gender = 'Male';
        $user->birthdate = '2002-01-21';
        $user->photo= 'profile2.png';
        $user->phone = '3128734838';
        $user->email = 'willypinto@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        //using DB Array
        DB::table('users')->insert([
            'document' => '1234567890',
            'fullname' => 'John Doe',
            'gender' => 'Male',
            'birthdate' => '1990-01-01',
            'photo' => 'profile3.png',
            'phone' => '1234567890',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'role' => 'Customer',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
