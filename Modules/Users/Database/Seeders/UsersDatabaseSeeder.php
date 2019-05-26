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

        $this->create($this->getData());
    }

    private function create($data){
        foreach($data as $item){
            User::create($item);
        }
    }

    private function getData(){
        return [
            ['name' => 'owlpro' , 'email' => 'mdpro.smm@gmail.com','password' => bcrypt('123456')],
            ['name' => 'user1' , 'email' => 'user1@gmail.com','password' => bcrypt('123456')],
            ['name' => 'user2' , 'email' => 'user2@gmail.com','password' => bcrypt('123456')],
            ['name' => 'user3' , 'email' => 'user3@gmail.com','password' => bcrypt('123456')],
        ];
    }
}
