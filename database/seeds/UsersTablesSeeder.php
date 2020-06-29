<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'    => 'manager@gmail.com',
            'password' => bcrypt('manager123'),
            'adress'    => 'kompong thom',
            'role'    => 1,
            // 'remember_token' =>  str_random(10),
        ]);
    }
}
