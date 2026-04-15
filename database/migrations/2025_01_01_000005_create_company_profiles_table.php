<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
        // Seed default data
        \DB::table('company_profiles')->insert([
            ['key' => 'company_name', 'value' => 'PT Berkah Alam Tabantang'],
            ['key' => 'tagline', 'value' => 'Mitra Terpercaya untuk Konstruksi & Infrastruktur di Batam'],
            ['key' => 'about_text', 'value' => 'PT Berkah Alam Tabantang adalah perusahaan konstruksi terkemuka yang berbasis di Kota Batam. Dengan spesialisasi pada pembangunan infrastruktur dan proyek komersial skala besar...'],
            ['key' => 'address', 'value' => 'Penum Oryx Batu Aji Asri TPH. 6 Desa V2 No.6 Kel. Sel Langki, Kec.Sagulung, Batam'],
            ['key' => 'office_hours', 'value' => 'Ruko Morbetko 2 Blok D6 No.7 Batam-Canter - Batam'],
            ['key' => 'email', 'value' => 'berkah@dynsho.com'],
            ['key' => 'phone', 'value' => '0813-6200-7109 / 6602-6937-7317'],
            ['key' => 'whatsapp_number', 'value' => '6281362007109'],
            ['key' => 'whatsapp_greeting', 'value' => 'Halo, saya tertarik dengan layanan konstruksi PT Berkah Alam Tabantang. Apakah bisa saya dapatkan informasi lebih lanjut?'],
        ]);
    }
    public function down(): void { Schema::dropIfExists('company_profiles'); }
};
