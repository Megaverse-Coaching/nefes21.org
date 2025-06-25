<?php

namespace Database\Seeders;

use App\Models\Admin\Soundscape;
use Illuminate\Database\Seeder;

class SoundscapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = $this->data();

        foreach ($data as $value) {
            Soundscape::create([
                'id' => $value['id'],
                'title' => $value['title'],
                'status' => 1
            ]);
        }
    }

    public function data(): array
    {
        return [
            ['id' => 601085, 'title' => 'Doğa'],
            ['id' => 601086, 'title' => 'Orman'],
            ['id' => 601087, 'title' => 'Huzur'],
            ['id' => 601088, 'title' => 'Bahar'],
            ['id' => 601089, 'title' => 'Dokunuş'],
            ['id' => 601090, 'title' => 'Heyecan'],
            ['id' => 601091, 'title' => 'Doğa Sesi'],
            ['id' => 601092, 'title' => 'Vadi'],
            ['id' => 601093, 'title' => 'Canlan'],
            ['id' => 601094, 'title' => 'Motivasyon'],
            ['id' => 601095, 'title' => 'Derin'],
            ['id' => 601096, 'title' => 'Huzura Yol'],
            ['id' => 601097, 'title' => 'Sessizce'],
            ['id' => 601098, 'title' => 'Gökyüzü'],
            ['id' => 601099, 'title' => 'Evren'],
            ['id' => 601100, 'title' => 'Dingin'],
            ['id' => 601101, 'title' => 'İlham'],
            ['id' => 601102, 'title' => 'Serinlik'],
            ['id' => 601103, 'title' => 'Aydınlık'],
            ['id' => 601104, 'title' => 'Odak'],
            ['id' => 601105, 'title' => 'Işıltı'],
            ['id' => 601106, 'title' => 'Ferah'],
            ['id' => 601107, 'title' => 'Cesur'],
            ['id' => 601108, 'title' => 'Hayal'],
            ['id' => 601109, 'title' => 'Hassas'],
            ['id' => 601110, 'title' => 'Nefes'],
            ['id' => 601111, 'title' => 'Uyku'],
            ['id' => 601112, 'title' => 'Rüya'],
            ['id' => 601113, 'title' => 'Relax'],
            ['id' => 601114, 'title' => 'Gece'],
            ['id' => 601115, 'title' => 'Ay Işığı'],
            ['id' => 601116, 'title' => 'Issız'],
            ['id' => 601117, 'title' => 'Meditasyon'],
        ];
    }
}
