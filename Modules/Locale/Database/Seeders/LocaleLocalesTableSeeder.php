<?php

namespace Modules\Locale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Locale\Entities\Locale;

class LocaleLocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
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
