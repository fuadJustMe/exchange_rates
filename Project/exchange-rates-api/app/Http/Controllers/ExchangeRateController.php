<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Currency;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    public function getLatestRates()
    {
        $rates = Rate::with('baseCurrency', 'targetCurrency')
                     ->where('effective_date', today())
                     ->get();

        return response()->json($rates);
    }

    public function getHistoricalRates(Request $request)
    {
        $date = $request->query('date');

        if (!$date) {
            return response()->json(['error' => 'Date is required'], 400);
        }

        $rates = Rate::with(['baseCurrency', 'targetCurrency'])
            ->where('effective_date', $date)
            ->get();

        if ($rates->isEmpty()) {
            return response()->json(['error' => 'No rates found for the selected date'], 404);
        }

        return response()->json($rates);
    }
}
