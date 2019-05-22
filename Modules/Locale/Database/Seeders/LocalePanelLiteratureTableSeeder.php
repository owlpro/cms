<?php

namespace Modules\Locale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Locale\Entities\PanelLiterature;

class LocalePanelLiteratureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();
        $this->truncatePanelLiterature();
        $this->MakePanelLiterature();
    }

    private function truncatePanelLiterature() {
        return PanelLiterature::truncate();
    }

    private function MakePanelLiterature() {
        $data = $this->getData();
        foreach ($data as $item) {
            PanelLiterature::create($item);
        }
    }

    private function getData() {
        return [
            ['locale_id' => 1, 'title' => 'btn.save', 'text' => 'ثبت'],
            ['locale_id' => 2, 'title' => 'btn.save', 'text' => 'save'],

            ['locale_id' => 1, 'title' => 'btn.new_item', 'text' => 'مورد جدید'],
            ['locale_id' => 2, 'title' => 'btn.new_item', 'text' => 'New Item'],

            ['locale_id' => 1, 'title' => 'create', 'text' => 'جدید'],
            ['locale_id' => 2, 'title' => 'create', 'text' => 'New Item'],

            ['locale_id' => 1, 'title' => 'list', 'text' => 'لیست'],
            ['locale_id' => 2, 'title' => 'list', 'text' => 'List'],

            ['locale_id' => 1, 'title' => 'locale.locale', 'text' => 'زبان ها'],
            ['locale_id' => 2, 'title' => 'locale.locale', 'text' => 'Locales'],

            ['locale_id' => 1, 'title' => 'locale.panel_lang', 'text' => 'ادبیات مدیریت'],
            ['locale_id' => 2, 'title' => 'locale.panel_lang', 'text' => 'Management Literature'],

            ['locale_id' => 1, 'title' => 'locale.site_lang', 'text' => 'ادبیات سایت'],
            ['locale_id' => 2, 'title' => 'locale.site_lang', 'text' => 'Site Literature'],

            ['locale_id' => 1, 'title' => 'module.locale', 'text' => 'مدیریت زبان ها'],
            ['locale_id' => 2, 'title' => 'module.locale', 'text' => 'Manage Languages'],

            ['locale_id' => 1, 'title' => 'module.users', 'text' => 'کاربران'],
            ['locale_id' => 2, 'title' => 'module.users', 'text' => 'Users'],
        ];
    }
}
