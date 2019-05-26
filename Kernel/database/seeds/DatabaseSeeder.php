<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();

        $this->call(LocaleLocalesTableSeeder::class);
        $this->call(LocalePanelLiteratureTableSeeder::class);
        $this->call(LocaleSiteLiteratureTableSeeder::class);

        foreach ($this->findModuleSeeders() as $seed) {
            $this->call($this->replaceSeederToCallableAddres($seed));
        }

        Schema::enableForeignKeyConstraints();
    }

    private function findModuleSeeders() {
        return glob(base_path('../Modules/*/Database/Seeders/*.php'));
    }

    private function replaceSeederToCallableAddres($seed) {
        $seed = explode('..', $seed)[1];
        $seed = str_replace('/', "\\", $seed);
        return str_replace('.php', '', $seed);
    }
}
