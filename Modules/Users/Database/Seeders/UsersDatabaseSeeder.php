<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\User;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        User::truncate();
        User::create([
           'name' => 'owl pro',
           'type' => User::SUPPER_ADMIN_TYPE,
           'email' => 'mdpro.smm@gmail.com',
           'password' => bcrypt('123456')
        ]);
    }
}
