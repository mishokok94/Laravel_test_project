<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyRateController extends Controller
{
  public function index(Request $request)
  {
      $selectedBase = Session::get('base_currency', 'USD');
      $availableCurrencies = CurrencyRate::distinct()->pluck('target_currency')->toArray();

      $query = CurrencyRate::where('base_currency', $selectedBase);

      if ($request->filled('target_currency')) {
          $query->where('target_currency', $request->target_currency);
      }

      if ($request->filled('min_rate')) {
          $query->where('rate', '>=', $request->min_rate);
      }
      if ($request->filled('max_rate')) {
          $query->where('rate', '<=', $request->max_rate);
      }

      if ($request->filled('start_date')) {
          $query->whereDate('fetched_at', '>=', $request->start_date);
      }
      if ($request->filled('end_date')) {
          $query->whereDate('fetched_at', '<=', $request->end_date);
      }

      $rates = $query->paginate(25);

      return view('currency-rates.index', compact('rates', 'selectedBase', 'availableCurrencies'));
  }
    public function setBaseCurrency(Request $request)
    {
        $request->validate([
            'base_currency' => 'required|string|max:3',
        ]);

        session(['base_currency' => $request->base_currency]);

        return redirect()->route('currency.index');
    }

    public function updateRates()
    {
        \Artisan::call('currency:update');

        return redirect()->route('currency.index')->with('success', 'Currency rates updated successfully.');
    }
}
