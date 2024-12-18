<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;

    /**
     * Class: `UserTableSeeder`
     *
     * Seeds the `users` table.
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
                'first_name' => 'Cas',
                'last_name' => 'Rovers',
                'email' => 'casrovers@example.com',
                'is_active' => true,
            ])->assignRole('Super Admin');

            User::factory(500)->create([
                'is_active' => false,
            ]);
        }
    }
