<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    /**
     * Class: `UserTableSeeder`
     *
     * Seeds the `users` table.
     *
     * @package Database\Seeders
     */
    class UserTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(): void
        {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

            // User::factory(10)->create();
        }
    }
