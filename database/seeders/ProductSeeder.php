<?php

namespace Database\Seeders;

use App\Models\Admin\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
            Product::create([
                'product_label' => $value['product_label'],
                'product_group' => $value['product_group'],
                'product_type' => $value['product_type'],
                'product_title' => $value['product_title'],
                'plan' => $value['plan'] ?? null,
                'duration' => $value['duration'] ?? null,
                'reward' => $value['reward'] ?? null,
                'program_id' => $value['program_id'] ?? null,
                'program_title' => $value['program_title'] ?? null,
                'environment' => $value['environment'],

                'updated_by' => 801000,
                'created_by' => 801000,
            ]);
        }
    }

    private function data(): array
    {
        return
            [
                [
                    "product_label" => "subscriptions.weekly",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "Haftalık Abonelik",
                    "plan" => "weekly",
                    "duration" => "604800000",
                    "environment" => "production",
                    "reward" => "referral"
                ],
                [
                    "product_label" => "subscriptions.21days",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "21 Günlük Abonelik",
                    "plan" => "21-days",
                    "duration" => "1814400000",
                    "environment" => "production",
                    "reward" => "referral-gift"
                ],
                [
                    "product_label" => "subscriptions.monthly",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "Aylık Abonelik",
                    "plan" => "monthly",
                    "duration" => "2592000000",
                    "environment" => "production"
                ],
                [
                    "product_label" => "subscriptions.3months",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "3 Aylık Abonelik",
                    "plan" => "3-months",
                    "duration" => "7776000000",
                    "environment" => "production"
                ],
                [
                    "product_label" => "subscriptions.6months",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "6 Aylık Abonelik",
                    "plan" => "6-months",
                    "duration" => "15552000000",
                    "environment" => "production"
                ],
                [
                    "product_label" => "subscriptions.yearly",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "Yıllık Abonelik",
                    "plan" => "yearly",
                    "duration" => "31536000000",
                    "environment" => "production"
                ],
                [
                    "product_label" => "subscriptions.lifetime",
                    "product_group" => "main",
                    "product_type" => "subscription",
                    "product_title" => "Sınırsız",
                    "plan" => "lifetime",
                    "duration" => "630720000000",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301027",
                    "product_group" => "main",
                    "product_type" => "program",
                    "product_title" => "Çakraların Hakikati",
                    "program_id" => "301027",
                    "program_title" => "Çakraların Hakikati",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301027.discounted",
                    "product_group" => "discounted",
                    "product_type" => "program",
                    "product_title" => "Çakraların Hakikati (İndirimli)",
                    "program_id" => "301027",
                    "program_title" => "Çakraların Hakikati",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301028",
                    "product_group" => "main",
                    "product_type" => "program",
                    "product_title" => "Tasavvuf ve Farkındalık",
                    "program_id" => "301028",
                    "program_title" => "Tasavvuf ve Farkındalık",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301028.discounted",
                    "product_group" => "discounted",
                    "product_type" => "program",
                    "product_title" => "Tasavvuf ve Farkındalık (İndirimli)",
                    "program_id" => "301028",
                    "program_title" => "Tasavvuf ve Farkındalık",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301029",
                    "product_group" => "main",
                    "product_type" => "program",
                    "product_title" => "Çakraların Hakikati 2",
                    "program_id" => "301029",
                    "program_title" => "Çakraların Hakikati 2",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301029.discounted",
                    "product_group" => "discounted",
                    "product_type" => "program",
                    "product_title" => "Çakraların Hakikati 2 (İndirimli)",
                    "program_id" => "301029",
                    "program_title" => "Çakraların Hakikati 2",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301030",
                    "product_group" => "main",
                    "product_type" => "program",
                    "product_title" => "Numeroloji Eğitimi",
                    "program_id" => "301030",
                    "program_title" => "Numeroloji Eğitimi",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301030.discounted",
                    "product_group" => "discounted",
                    "product_type" => "program",
                    "product_title" => "Numeroloji Eğitimi (İndirimli)",
                    "program_id" => "301030",
                    "program_title" => "Numeroloji Eğitimi",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301031",
                    "product_group" => "main",
                    "product_type" => "program",
                    "product_title" => "Ruh Eşimi Nasıl Çekerim?",
                    "program_id" => "301031",
                    "program_title" => "Ruh Eşimi Nasıl Çekerim?",
                    "environment" => "production"
                ],
                [
                    "product_label" => "programs.301031.discounted",
                    "product_group" => "discounted",
                    "product_type" => "program",
                    "product_title" => "Ruh Eşimi Nasıl Çekerim? (İndirimli)",
                    "program_id" => "301031",
                    "program_title" => "Ruh Eşimi Nasıl Çekerim?",
                    "environment" => "production"
                ]
            ];
    }
}
