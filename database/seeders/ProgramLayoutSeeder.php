<?php

namespace Database\Seeders;

use App\Models\Admin\ProgramLayout;
use Illuminate\Database\Seeder;

class ProgramLayoutSeeder extends Seeder
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
            ProgramLayout::create([
                'program_id' => $value['program_id'],
                'isDiscounted' => $value['isDiscounted'],
                'label_id' => $value['label_id'],
                'order' => $value['order'],
                'updated_by' => 801000,
                'created_by' => 801000,
            ]);
        }
    }

    private function data():array
    {
        return [
            [
                "program_id" =>  "301027",
                "isDiscounted" =>  false,
                "label_id" =>  "featured",
                "order" =>  4,
            ],
            [
                "program_id" =>  "301028",
                "isDiscounted" =>  false,
                "label_id" =>  "",
                "order" =>  5,
            ],
            [
                "program_id" =>  "301029",
                "isDiscounted" =>  false,
                "label_id" =>  "recommended",
                "order" =>  2,
            ],
            [
                "program_id" =>  "301030",
                "isDiscounted" =>  false,
                "label_id" =>  "featured",
                "order" =>  3,
            ],
            [
                "program_id" =>  "301031",
                "isDiscounted" =>  true,
                "label_id" =>  "featured",
                "order" =>  1,
            ]
        ];
    }
}
