<?php

namespace Database\Seeders;

// database/seeders/RateSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Currency;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    public function run()
    {

        $currencies = Currency::all();
        $baseCurrency = Currency::where('code', 'USD')->first();

        foreach ($currencies as $currency) {
            if ($currency->id === $baseCurrency->id) {
                continue;
            }

            // Create random rates for the past 10 days
            for ($i = 0; $i < 10; $i++) {
                $effectiveDate = now()->subDays($i)->format('Y-m-d'); 
                Rate::create([
                    'base_currency_id' => $baseCurrency->id,
                    'target_currency_id' => $currency->id,
                    'rate' => rand(50, 150) / 100,
                    'effective_date' => $effectiveDate,
                ]);
            }
        }
    }
}
