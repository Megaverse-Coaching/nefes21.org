<?php

namespace Database\Seeders;

use App\Models\Admin\ProgramSection;
use Illuminate\Database\Seeder;

class ProgramSectionSeeder extends Seeder
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
            ProgramSection::create([
                'section_id' => $value['section_id'],
                'section_title' => $value['section_title'],
                'order' => $value['order'],
                'program_id' => $value['program_id'],
            ]);
        }
    }


    private function data():array
    {
        return [
            [
                "section_id" => "section-984798",
                "section_title" => "1.Bölüm",
                "order" => 1,
                "program_id" => 301031,
            ],
            [
                "section_id" => "section-507826",
                "section_title" => "2.Bölüm",
                "order" => 2,
                "program_id" => 301031,
            ],
            [
                "section_id" => "section-159702",
                "section_title" => "3.Bölüm",
                "order" => 3,
                "program_id" => 301031,
            ],
            [
                "section_id" => "section-554946",
                "section_title" => "4.Bölüm",
                "order" => 4,
                "program_id" => 301031,
            ],
            [
                "section_id" => "section-590288",
                "section_title" => "1.Bölüm",
                "order" => 1,
                "program_id" => 301030,
            ],
            [
                "section_id" => "section-479561",
                "section_title" => "2.Bölüm",
                "order" => 2,
                "program_id" => 301030,
            ],
            [
                "section_id" => "section-359117",
                "section_title" => "3.Bölüm",
                "order" => 3,
                "program_id" => 301030,
            ],
            [
                "section_id" => "section-608607",
                "section_title" => "4.Bölüm",
                "order" => 4,
                "program_id" => 301030,
            ],
            [
                "section_id" => "section-511005",
                "section_title" => "1.Bölüm",
                "order" => 1,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-423909",
                "section_title" => "2.Bölüm",
                "order" => 2,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-132131",
                "section_title" => "3.Bölüm",
                "order" => 3,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-301417",
                "section_title" => "4.Bölüm",
                "order" => 4,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-190515",
                "section_title" => "5.Bölüm",
                "order" => 5,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-857668",
                "section_title" => "6.Bölüm",
                "order" => 6,
                "program_id" => 301029,
            ],
            [
                "section_id" => "section-999173",
                "section_title" => "Tasavvuf'a giriş",
                "order" => 1,
                "program_id" => 301028,
            ],
            [
                "section_id" => "section-519987",
                "section_title" => "İçsel Yolculuk",
                "order" => 2,
                "program_id" => 301028,
            ],
            [
                "section_id" => "section-159292",
                "section_title" => "Nefes Çalışması",
                "order" => 3,
                "program_id" => 301028,
            ],
            [
                "section_id" => "section-371859",
                "section_title" => "1. Bölüm",
                "order" => 1,
                "program_id" => 301027,
            ],
            [
                "section_id" => "section-124493",
                "section_title" => "2. Bölüm",
                "order" => 2,
                "program_id" => 301027,
            ],
            [
                "section_id" => "section-764663",
                "section_title" => "3. Bölüm",
                "order" => 3,
                "program_id" => 301027,
            ]
        ];
    }
}
