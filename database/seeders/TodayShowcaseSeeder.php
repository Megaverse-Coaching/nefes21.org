<?php

namespace Database\Seeders;

use App\Models\Admin\TodayShowcase;
use Illuminate\Database\Seeder;

class TodayShowcaseSeeder extends Seeder
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
            TodayShowcase::create([
                'id' => $value['id'],
                'action' => $value['action'],
                'actionUrl' => $value['actionUrl'],
                'content_id' => $value['content_id'],
                'method' => $value['method'],
                'priority' => $value['priority'],
                'imageUrl' => $value['imageUrl'],
                'isFree' => $value['isFree'],
                'isValid' => $value['isValid'],
                'showcase_id' => $value['showcase_id'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return [
            [
                "id" =>  "701029",
                "action" =>  "open_content",
                "actionUrl" =>  null,
                "content_id" =>  "101358",
                "method" =>  "non-personalized",
                "priority" =>  100,
                "imageUrl" =>  null,
                "isFree" =>  0,
                "isValid" =>  1,
                "showcase_id" =>  "featured",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "id" =>  "701033",
                "action" =>  "open_content",
                "actionUrl" =>  null,
                "content_id" =>  "101377",
                "method" =>  "non-personalized",
                "priority" =>  200,
                "imageUrl" =>  null,
                "isFree" =>  0,
                "isValid" =>  1,
                "showcase_id" =>  "featured",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "id" =>  "701035",
                "action" =>  "open_content",
                "actionUrl" =>  null,
                "content_id" =>  "101369",
                "method" =>  "non-personalized",
                "priority" =>  300,
                "imageUrl" =>  null,
                "isFree" =>  0,
                "isValid" =>  1,
                "showcase_id" =>  "featured",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "id" =>  "701036",
                "action" =>  "open_content",
                "actionUrl" =>  null,
                "content_id" =>  "101373",
                "method" =>  "non-personalized",
                "priority" =>  400,
                "imageUrl" =>  null,
                "isFree" =>  0,
                "isValid" =>  1,
                "showcase_id" =>  "featured",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "id" =>  "701037",
                "action" =>  "open_url",
                "actionUrl" =>  "https://kisiselgelisim.tv/canli-yayin",
                "content_id" =>  null,
                "method" =>  "non-personalized",
                "priority" =>  10,
                "imageUrl" =>  "/images/today-showcases/701037-113430.jpg",
                "isFree" =>  1,
                "isValid" =>  1,
                "showcase_id" =>  "live_stream",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "id" =>  "701038",
                "action" =>  "open_content",
                "actionUrl" =>  null,
                "content_id" =>  "101340",
                "method" =>  "non-personalized",
                "priority" =>  1200,
                "imageUrl" =>  null,
                "isFree" =>  0,
                "isValid" =>  1,
                "showcase_id" =>  "monthly_exclusive",
                "created_by" => 801000,
                "updated_by" => 801000,
            ]
        ];
    }
}
