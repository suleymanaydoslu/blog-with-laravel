<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * For a specific admin user
         */
        User::create([
            'first_name' => 'Süleyman',
            'last_name' => 'Aydoslu',
            'email' => 'admin@blog.app',
            'password' => 'secret'
        ]);

        /**
         * Seeding X users via faker factory
         */

        $usersCount = 10;
        factory(User::class,$usersCount)->create();
    }
}
