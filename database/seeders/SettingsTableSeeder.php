<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'image', 'value' => 'uploads/logo.png']);
        Setting::create(['key' => 'address', 'value' => '123 Đường ABC, Quận X, Thành phố Y']);
        Setting::create(['key' => 'phone', 'value' => '0123456789']);
        Setting::create(['key' => 'google_map', 'value' => 'https://goo.gl/maps/example']);
    }
}
