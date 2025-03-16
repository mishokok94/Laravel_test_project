import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('changeBaseCurrencyBtn').addEventListener('click', function () {
        document.getElementById('baseCurrencyModal').classList.remove('hidden');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function () {
        document.getElementById('baseCurrencyModal').classList.add('hidden');
    });
});
