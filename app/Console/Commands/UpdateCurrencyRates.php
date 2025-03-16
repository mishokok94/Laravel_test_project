<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CurrencyRate;


class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updates currency rates from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseCurrency = session('base_currency', 'USD');
        $apiKey = env('EXCHANGE_RATE_API_KEY');
        $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/{$baseCurrency}");

        if ($response->failed()) {
            $this->error('Error API request. ');
            return;
        }

        $data = $response->json();

        if ($data['result'] !== 'success') {
            $this->error('API error');
            return;
        }

        foreach ($data['conversion_rates'] as $currency => $rate) {
            CurrencyRate::updateOrCreate(
                [   'base_currency' => $baseCurrency,
                    'target_currency' => $currency],
                ['rate' => $rate, 'fetched_at' => now()]
            );
        }

        $this->info('Successfully updated currency rates.');
    }
}
