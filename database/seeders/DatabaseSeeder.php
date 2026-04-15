<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Portfolio;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        Service::create(['title'=>'Pembangunan Infrastruktur','description'=>'Jalan, jembatan, drainase','order'=>1,'is_active'=>true]);
        Service::create(['title'=>'Proyek Komersial','description'=>'Gedung perkantoran, pusat perbelanjaan','order'=>2,'is_active'=>true]);
        Service::create(['title'=>'Manajemen Konstruksi','description'=>'Supervisi dan konsultasi teknis','order'=>3,'is_active'=>true]);

        Portfolio::create([
            'title'=>'Pengembangan Infrastruktur Terpadu – Opus Bay Waterfront',
            'location'=>'Batam',
            'description'=>'Pembangunan sistem drainase makro dan mikro',
            'technical_specs'=>'Saluran U-Ditch beton pracetak',
            'challenge_solution'=>'Tanah lunak, perkuatan fondasi',
            'result'=>'Drainase optimal saat hujan tinggi',
            'thumbnail'=>'portofolio/opusbay.jpg'
        ]);
    }
}
