<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
            DB::table('users')->insert([
                'nombre' => 'administrador',
                'email' => 'administrador@admin.com',
                'user' => 'admin',
                'role' => 'admin',
                'password' => bcrypt('admin1234')
            ]);
            factory(User::class)->times(20)->create();
            
        
    }
}
