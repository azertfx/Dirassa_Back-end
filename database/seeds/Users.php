<?php

use Illuminate\Database\Seeder;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name     = 'ADMIN';
        $admin->level    = 'admin';
        $admin->password = bcrypt('dirassa2015admin');
        $admin->email    = 'admin@dirassa.ma';
        $admin->save();

        $users = new User;
        $users->name     = 'USER';
        $users->level    = 'user';
        $users->password = bcrypt('dirassauserspass');
        $users->email    = 'users@dirassa.ma';
        $users->save();
    }
}
