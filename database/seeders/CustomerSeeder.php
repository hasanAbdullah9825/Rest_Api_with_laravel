<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Invoice;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        Customer::factory()->count(25)
            ->hasInvoices(10, function (array $attributes, Customer $customer) {
                return [
                    'customer_id' => $customer->id,
                ];
            })
            ->create();



            Customer::factory()->count(100)
            ->hasInvoices(5, function (array $attributes, Customer $customer) {
                return [
                    'customer_id' => $customer->id,
                ];
            })
            ->create();



            Customer::factory()->count(100)
            ->hasInvoices(3, function (array $attributes, Customer $customer) {
                return [
                    'customer_id' => $customer->id,
                ];
            })
            ->create();



            Customer::factory()->count(5)
             ->create();
    }
}
