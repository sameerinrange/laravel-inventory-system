<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = [
            ['name' => 'United States Dollar', 'currency_code' => 'USD', 'currency_symbol' => '$', 'status' => 'active'],
            ['name' => 'Euro', 'currency_code' => 'EUR', 'currency_symbol' => '€', 'status' => 'inactive'],
            ['name' => 'British Pound', 'currency_code' => 'GBP', 'currency_symbol' => '£', 'status' => 'inactive'],
            ['name' => 'Indian Rupee', 'currency_code' => 'INR', 'currency_symbol' => '₹', 'status' => 'active'],
            ['name' => 'Australian Dollar', 'currency_code' => 'AUD', 'currency_symbol' => 'A$', 'status' => 'inactive'],
            ['name' => 'Canadian Dollar', 'currency_code' => 'CAD', 'currency_symbol' => 'C$', 'status' => 'inactive'],
            ['name' => 'Swiss Franc', 'currency_code' => 'CHF', 'currency_symbol' => 'Fr.', 'status' => 'inactive'],
            ['name' => 'Chinese Yuan', 'currency_code' => 'CNY', 'currency_symbol' => '¥', 'status' => 'inactive'],
            ['name' => 'Japanese Yen', 'currency_code' => 'JPY', 'currency_symbol' => '¥', 'status' => 'inactive'],
            ['name' => 'Russian Ruble', 'currency_code' => 'RUB', 'currency_symbol' => '₽', 'status' => 'inactive'],
            ['name' => 'South Korean Won', 'currency_code' => 'KRW', 'currency_symbol' => '₩', 'status' => 'inactive'],
            ['name' => 'Brazilian Real', 'currency_code' => 'BRL', 'currency_symbol' => 'R$', 'status' => 'inactive'],
            ['name' => 'Mexican Peso', 'currency_code' => 'MXN', 'currency_symbol' => '$', 'status' => 'inactive'],
            ['name' => 'South African Rand', 'currency_code' => 'ZAR', 'currency_symbol' => 'R', 'status' => 'inactive'],
            ['name' => 'Singapore Dollar', 'currency_code' => 'SGD', 'currency_symbol' => 'S$', 'status' => 'inactive'],
            ['name' => 'New Zealand Dollar', 'currency_code' => 'NZD', 'currency_symbol' => 'NZ$', 'status' => 'inactive'],
            ['name' => 'Hong Kong Dollar', 'currency_code' => 'HKD', 'currency_symbol' => 'HK$', 'status' => 'inactive'],
            ['name' => 'Swedish Krona', 'currency_code' => 'SEK', 'currency_symbol' => 'kr', 'status' => 'inactive'],
            ['name' => 'Norwegian Krone', 'currency_code' => 'NOK', 'currency_symbol' => 'kr', 'status' => 'inactive'],
            ['name' => 'Danish Krone', 'currency_code' => 'DKK', 'currency_symbol' => 'kr', 'status' => 'inactive'],
            ['name' => 'Thai Baht', 'currency_code' => 'THB', 'currency_symbol' => '฿', 'status' => 'inactive'],
            ['name' => 'Indonesian Rupiah', 'currency_code' => 'IDR', 'currency_symbol' => 'Rp', 'status' => 'inactive'],
            ['name' => 'Philippine Peso', 'currency_code' => 'PHP', 'currency_symbol' => '₱', 'status' => 'inactive'],
            ['name' => 'Turkish Lira', 'currency_code' => 'TRY', 'currency_symbol' => '₺', 'status' => 'inactive'],
            ['name' => 'Saudi Riyal', 'currency_code' => 'SAR', 'currency_symbol' => '﷼', 'status' => 'inactive'],
            ['name' => 'United Arab Emirates Dirham', 'currency_code' => 'AED', 'currency_symbol' => 'د.إ‎', 'status' => 'inactive'],
        ];

        DB::table('currencies')->insert($currencies);
    }
}

