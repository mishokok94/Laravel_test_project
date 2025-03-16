<form method="GET" action="{{ route('currency.index') }}" class="mb-6 flex space-x-4">
    <select name="target_currency" class="border rounded-lg px-4 py-2">
        <option value="">All Currencies</option>
        @foreach ($availableCurrencies as $currency)
            <option value="{{ $currency }}" {{ request('target_currency') == $currency ? 'selected' : '' }}>
                {{ $currency }}
            </option>
        @endforeach
    </select>

    <input type="number" name="min_rate" value="{{ request('min_rate') }}" placeholder="Min Rate" class="border rounded-lg px-4 py-2">
    <input type="number" name="max_rate" value="{{ request('max_rate') }}" placeholder="Max Rate" class="border rounded-lg px-4 py-2">

    <input type="date" name="start_date" value="{{ request('start_date') }}" class="border rounded-lg px-4 py-2">
    <input type="date" name="end_date" value="{{ request('end_date') }}" class="border rounded-lg px-4 py-2">

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Filter</button>
    <a href="{{ route('currency.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Reset</a>
</form>
