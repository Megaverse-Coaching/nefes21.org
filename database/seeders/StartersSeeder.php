<?php

namespace Database\Seeders;

use App\Models\Admin\Starter;
use Illuminate\Database\Seeder;

class StartersSeeder extends Seeder
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
            Starter::create([
                'content_id' => $value['content_id'],
                'order' => $value['order'],
                'section_id' => $value['section_id'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return [
            [
                "content_id"=> "101335",
                "order"=> 1,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101187",
                "order"=> 2,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101400",
                "order"=> 3,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101399",
                "order"=> 4,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101350",
                "order"=> 5,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101179",
                "order"=> 6,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101378",
                "order"=> 7,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101383",
                "order"=> 8,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101080",
                "order"=> 9,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101101",
                "order"=> 10,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101294",
                "order"=> 11,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101106",
                "order"=> 12,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101076",
                "order"=> 13,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101085",
                "order"=> 14,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ],
            [
                "content_id"=> "101116",
                "order"=> 15,
                "section_id"=> "starters",
                "created_by" => 801000,
                "updated_by" => 801000
            ]
        ];
    }
}
