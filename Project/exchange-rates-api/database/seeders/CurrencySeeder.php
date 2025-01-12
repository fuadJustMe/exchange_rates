<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            ['name' => 'US Dollar', 'code' => 'USD'],
            ['name' => 'Euro', 'code' => 'EUR'],
            ['name' => 'British Pound', 'code' => 'GBP'],
            ['name' => 'Japanese Yen', 'code' => 'JPY'],
            ['name' => 'Canadian Dollar', 'code' => 'CAD'],
            ['name' => 'Hong Kong Dollar', 'code' => 'HKD'],
            ['name' => 'Chinese Yuan', 'code' => 'CNY'],
            ['name' => 'South Korean Won', 'code' => 'KRW'],
            ['name' => 'New Zealand Dollar', 'code' => 'NZD'],
        ];

        foreach ($currencies as $currency) {
            Currency::firstOrCreate(['code' => $currency['code']], $currency);
        }
    }
}
