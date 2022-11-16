<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Sn1KeRs385\FileUploader\Database\Seeders\FilesTableEnumSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilesTableEnumSeeder::class);
        $this->call(CodeTypesSeeder::class);
        $this->call(IdentifierTypesSeeder::class);
    }
}
