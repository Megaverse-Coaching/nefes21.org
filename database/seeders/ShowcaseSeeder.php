<?php

namespace Database\Seeders;

use App\Models\Admin\Showcase;
use Illuminate\Database\Seeder;

class ShowcaseSeeder extends Seeder
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
            Showcase::create([
                'showcase' => $value['showcase'],
                'status' => $value['status'],
                'title' => $value['title'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return [
            ['showcase'=> 'featured', 'status' => 1,  'title' => 'Öne Çıkan', 'updated_by'=>801000, 'created_by'=>801000],
            ['showcase'=> 'recommended', 'status' => 1, 'title' => 'Önerilen', 'updated_by'=>801000, 'created_by'=>801000],
            ['showcase'=> 'live_stream', 'status' => 1, 'title' => 'Canlı Yayın', 'updated_by'=>801000, 'created_by'=>801000],
            ['showcase'=> 'monthly_exclusive', 'status' => 1, 'title' => 'Bu Aya Özel', 'updated_by'=>801000, 'created_by'=>801000],
        ];
    }
}
