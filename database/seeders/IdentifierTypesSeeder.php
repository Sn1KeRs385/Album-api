<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class IdentifierTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableTypes = Arr::pluck(\App\Enums\IdentifierType::cases(), 'value');
        $availableTypes = array_map(fn($item) => "'$item'", $availableTypes);
        $availableTypes = implode(', ', $availableTypes);

        if (config('database.default') === 'mysql') {
            DB::statement(
                "ALTER TABLE `user_identifiers` CHANGE `type` `type` ENUM($availableTypes) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL"
            );
        }
    }
}
