<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name','admin')->first();

        $role_user = Role::where('name','user')->first();

        $admin = new User();
        $admin->name = 'Olek Buk';
        $admin->email = 'n00221532@iadt.ie';
        $admin->password = Hash::make('password');
        $admin->save();

        // attatch admin role to the user that was created above.
        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'Joe Jones';
        $user->email = 'joe@larafest.ie';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
