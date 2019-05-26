<?php

use App\InternalModels\Locale\Locale;
use Illuminate\Database\Seeder;

class LocaleLocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locale::truncate();
        $this->defineLocales();
    }

    private function defineLocales() {
        Locale::create([
           'symbol' => 'FA',
           'title' => 'فارسی',
           'direction' => 'rtl',
           'active' => true,
        ]);

        Locale::create([
            'symbol' => 'EN',
            'title' => 'English',
            'direction' => 'ltr',
            'active' => true,
        ]);
    }
}
