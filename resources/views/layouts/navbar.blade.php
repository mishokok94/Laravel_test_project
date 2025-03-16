<nav class="bg-gray-800 p-4 text-white flex justify-between items-center">
    <div class="flex items-center">
        <form action="{{ route('currency.update') }}" method="POST">
            @csrf
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                Update Rates Now
            </button>
        </form>

        <button id="changeBaseCurrencyBtn" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-500 ml-6">
            Change Base Currency
        </button>
    </div>
    <div>
        @auth
            <span class="mr-4">Welcome, {{ auth()->user()->name }} enjoy fresh currency data</span>
            <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500 rounded">Logout</a>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 rounded">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 rounded ml-2">Register</a>
        @endauth
    </div>
</nav>
