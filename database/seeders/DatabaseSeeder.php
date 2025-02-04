<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create(['name' => 'SUPER ADMIN', 'email' => 'super_admin@gmail.com', 'id_lab' => null, 'password' => '$2y$12$M/bpfZ/iOee4ETeoBhodB.ioQsUnPMDQpH/UI2VhHs5Dyslcd1dg2']);
        User::factory()->create(['name' => 'ADMIN LAB TEKNOLOGI INFORMASI DAN APLIKASI', 'email' => 'admin_tia@gmail.com', 'id_lab' => 1, 'password' => '$2y$12$Xa1HkKT/Qx6pii7/T315Zetr7tvgMOBPr4bRGXFKFNme56g12.sne']);
        User::factory()->create(['name' => 'ADMIN LAB COMMON COMPUTING', 'email' => 'admin_cc@gmail.com', 'id_lab' => 2, 'password' => '$2y$12$FWsMLkL..CM.5qQUP/D3YOHxfjPOjyCk/yevpZuLEqWCfEtZkkJWO']);
        User::factory()->create(['name' => 'ADMIN LAB MULTIMEDIA', 'email' => 'admin_multimedia@gmail.com', 'id_lab' => 3, 'password' => '$2y$12$BoxhdCA/E4NaPr4idfwDfOX69UX4wve3kzMYcx9SN/7YmD9SuYey2']);
        User::factory()->create(['name' => 'ADMIN LAB SISTEM TERDISTRIBUSI', 'email' => 'admin_sister@gmail.com', 'id_lab' => 4, 'password' => '$2y$12$phxCC82j8Kn8LptnYTi69OR/vWf9LQ7iv6QHDds9.DeZI0yMQBeH6']);
        User::factory()->create(['name' => 'ADMIN LAB RISET', 'email' => 'admin_riset@gmail.com', 'id_lab' => 5, 'password' => '$2y$12$Ugmq73xy26PD7MCq5iASp.Tb5Jkorhle0tyrx5/UlyoBrvEaDDvBe']);
    }
}
