<?php

namespace Database\Seeders;

use App\Models\Admin\ShowcaseLayout;
use Illuminate\Database\Seeder;

class ShowcaseLayoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $data = $this->data();

        foreach ($data as $value) {
            ShowcaseLayout::create([
                'content_id' => $value['content_id'],
                'dimension_id' => $value['dimension_id'],
                'category_order' => $value['category_order'],
                'showcase_id' => $value['showcase_id'],
            ]);
        }
    }


    private function data():array
    {
        return [
            [
                'content_id' => '101364',
                'dimension_id' => 'music',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101208',
                'dimension_id' => 'music',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101320',
                'dimension_id' => 'music',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101344',
                'dimension_id' => 'music',
                'category_order' => 4,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101200',
                'dimension_id' => 'music',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101201',
                'dimension_id' => 'music',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101203',
                'dimension_id' => 'music',
                'category_order' => 7,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101202',
                'dimension_id' => 'music',
                'category_order' => 8,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101204',
                'dimension_id' => 'music',
                'category_order' => 9,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101400',
                'dimension_id' => 'family_parenting',
                'category_order' => 1,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101382',
                'dimension_id' => 'family_parenting',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101339',
                'dimension_id' => 'family_parenting',
                'category_order' => 3,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101110',
                'dimension_id' => 'family_parenting',
                'category_order' => 4,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101118',
                'dimension_id' => 'family_parenting',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101115',
                'dimension_id' => 'family_parenting',
                'category_order' => 6,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101190',
                'dimension_id' => 'family_parenting',
                'category_order' => 7,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101129',
                'dimension_id' => 'family_parenting',
                'category_order' => 8,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101369',
                'dimension_id' => 'physical',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101357',
                'dimension_id' => 'physical',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101351',
                'dimension_id' => 'physical',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101278',
                'dimension_id' => 'physical',
                'category_order' => 4,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101306',
                'dimension_id' => 'physical',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101341',
                'dimension_id' => 'physical',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101222',
                'dimension_id' => 'physical',
                'category_order' => 7,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101294',
                'dimension_id' => 'physical',
                'category_order' => 8,
                'showcase_id' => 'live_stream',
            ],
            [
                'content_id' => '101307',
                'dimension_id' => 'physical',
                'category_order' => 9,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101383',
                'dimension_id' => 'relationships',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101377',
                'dimension_id' => 'relationships',
                'category_order' => 2,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101315',
                'dimension_id' => 'relationships',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101073',
                'dimension_id' => 'relationships',
                'category_order' => 4,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101084',
                'dimension_id' => 'relationships',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101074',
                'dimension_id' => 'relationships',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101223',
                'dimension_id' => 'relationships',
                'category_order' => 7,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101090',
                'dimension_id' => 'relationships',
                'category_order' => 8,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101104',
                'dimension_id' => 'relationships',
                'category_order' => 9,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101165',
                'dimension_id' => 'relationships',
                'category_order' => 10,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101457',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101454',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101446',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101410',
                'dimension_id' => 'spiritual',
                'category_order' => 4,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101396',
                'dimension_id' => 'spiritual',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101399',
                'dimension_id' => 'spiritual',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101374',
                'dimension_id' => 'spiritual',
                'category_order' => 7,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101348',
                'dimension_id' => 'spiritual',
                'category_order' => 8,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101353',
                'dimension_id' => 'spiritual',
                'category_order' => 9,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101288',
                'dimension_id' => 'spiritual',
                'category_order' => 10,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101108',
                'dimension_id' => 'spiritual',
                'category_order' => 11,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101332',
                'dimension_id' => 'spiritual',
                'category_order' => 12,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101216',
                'dimension_id' => 'spiritual',
                'category_order' => 13,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101214',
                'dimension_id' => 'spiritual',
                'category_order' => 14,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101109',
                'dimension_id' => 'spiritual',
                'category_order' => 15,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101161',
                'dimension_id' => 'spiritual',
                'category_order' => 16,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101448',
                'dimension_id' => 'spiritual',
                'category_order' => 17,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101411',
                'dimension_id' => 'intellectual',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101373',
                'dimension_id' => 'intellectual',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101366',
                'dimension_id' => 'intellectual',
                'category_order' => 3,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101291',
                'dimension_id' => 'intellectual',
                'category_order' => 4,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101257',
                'dimension_id' => 'intellectual',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101333',
                'dimension_id' => 'intellectual',
                'category_order' => 6,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101328',
                'dimension_id' => 'intellectual',
                'category_order' => 7,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101300',
                'dimension_id' => 'intellectual',
                'category_order' => 8,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101107',
                'dimension_id' => 'intellectual',
                'category_order' => 9,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101188',
                'dimension_id' => 'intellectual',
                'category_order' => 10,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101218',
                'dimension_id' => 'emotional',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101106',
                'dimension_id' => 'emotional',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101074',
                'dimension_id' => 'emotional',
                'category_order' => 3,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101080',
                'dimension_id' => 'emotional',
                'category_order' => 4,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101104',
                'dimension_id' => 'emotional',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101109',
                'dimension_id' => 'emotional',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101081',
                'dimension_id' => 'emotional',
                'category_order' => 7,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101114',
                'dimension_id' => 'emotional',
                'category_order' => 8,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101385',
                'dimension_id' => 'emotional',
                'category_order' => 9,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101451',
                'dimension_id' => 'meditation',
                'category_order' => 1,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101370',
                'dimension_id' => 'meditation',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101337',
                'dimension_id' => 'meditation',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101127',
                'dimension_id' => 'meditation',
                'category_order' => 4,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101314',
                'dimension_id' => 'meditation',
                'category_order' => 5,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101106',
                'dimension_id' => 'meditation',
                'category_order' => 6,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101129',
                'dimension_id' => 'meditation',
                'category_order' => 7,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101297',
                'dimension_id' => 'meditation',
                'category_order' => 8,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101298',
                'dimension_id' => 'meditation',
                'category_order' => 9,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101430',
                'dimension_id' => 'occupational',
                'category_order' => 1,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101375',
                'dimension_id' => 'occupational',
                'category_order' => 2,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101276',
                'dimension_id' => 'occupational',
                'category_order' => 3,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101324',
                'dimension_id' => 'occupational',
                'category_order' => 4,
                'showcase_id' => 'monthly_exclusive',
            ],
            [
                'content_id' => '101342',
                'dimension_id' => 'occupational',
                'category_order' => 5,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101083',
                'dimension_id' => 'occupational',
                'category_order' => 6,
                'showcase_id' => 'featured',
            ],
            [
                'content_id' => '101161',
                'dimension_id' => 'occupational',
                'category_order' => 7,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101103',
                'dimension_id' => 'occupational',
                'category_order' => 8,
                'showcase_id' => 'recommended',
            ],
            [
                'content_id' => '101100',
                'dimension_id' => 'occupational',
                'category_order' => 9,
                'showcase_id' => 'recommended',
            ],
        ];

    }
}
