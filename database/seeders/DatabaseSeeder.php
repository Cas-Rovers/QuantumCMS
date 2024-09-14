<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    /**
     * Seeds the application's database with initial data.
     *
     * This class serves as the main entry point for database seeding.
     * It calls other seeder classes to populate the database with default data.
     *
     * @package Database\Seeders
     */
    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * This method is called when the seeder is executed.
         * It calls the `run` method on other seeder classes to populate the database.
         *
         * @return void
         */
        public function run(): void
        {
            $this->call([
                RolesAndPermissionsSeeder::class,
                UserTableSeeder::class,
            ]);
        }
    }
