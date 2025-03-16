@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Exchange Rates</h1>

    @include('partials.filters')

    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-white">
        <tr>
            <th class="p-4 text-left">Base Currency</th>
            <th class="p-4 text-left">Target Currency</th>
            <th class="p-4 text-left">Rate</th>
            <th class="p-4 text-left">Last Updated</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rates as $rate)
            <tr class="border-b">
                <td class="p-4">{{ $rate->base_currency }}</td>
                <td class="p-4">{{ $rate->target_currency }}</td>
                <td class="p-4">{{ $rate->rate }}</td>
                <td class="p-4">{{ $rate->fetched_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-red-500">No data available</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $rates->links() }}
    </div>
@endsection
