<div id="baseCurrencyModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Select Base Currency</h2>

        <form action="{{ route('currency.setBase') }}" method="POST">
            @csrf
            <select name="base_currency" id="base_currency" class="border rounded-lg px-4 py-2 w-full">
                @foreach ($availableCurrencies as $currency)
                    <option value="{{ $currency }}" {{ $currency == $selectedBase ? 'selected' : '' }}>
                        {{ $currency }}
                    </option>
                @endforeach
            </select>

            <div class="flex justify-end mt-4">
                <button type="button" id="closeModalBtn" class="bg-gray-400 text-white px-4 py-2 rounded-lg mr-2">
                    Cancel
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Apply
                </button>
            </div>
        </form>
    </div>
</div>
