<?php


use App\InternalModels\Locale\PanelLiterature;
use Illuminate\Database\Seeder;


class LocalePanelLiteratureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
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
            ['locale_id' => 1, 'title' => 'btn.save', 'text' => 'ذخیره'],
            ['locale_id' => 2, 'title' => 'btn.save', 'text' => 'Save'],

            ['locale_id' => 1, 'title' => 'btn.new_item', 'text' => 'مورد جدید'],
            ['locale_id' => 2, 'title' => 'btn.new_item', 'text' => 'New Item'],

            ['locale_id' => 1, 'title' => 'create', 'text' => 'جدید'],
            ['locale_id' => 2, 'title' => 'create', 'text' => 'New'],

            ['locale_id' => 1, 'title' => 'list', 'text' => 'لیست'],
            ['locale_id' => 2, 'title' => 'list', 'text' => 'List'],

            ['locale_id' => 1, 'title' => 'locale.locale', 'text' => 'زبان ها'],
            ['locale_id' => 2, 'title' => 'locale.locale', 'text' => 'Locales'],

            ['locale_id' => 1, 'title' => 'locale.panel_lang', 'text' => 'ادبیات مدیریت'],
            ['locale_id' => 2, 'title' => 'locale.panel_lang', 'text' => 'Management Literature'],

            ['locale_id' => 1, 'title' => 'locale.site_lang', 'text' => 'ادبیات سایت'],
            ['locale_id' => 2, 'title' => 'locale.site_lang', 'text' => 'Site Literature'],

            ['locale_id' => 1, 'title' => 'system.locale', 'text' => 'مدیریت زبان ها'],
            ['locale_id' => 2, 'title' => 'system.locale', 'text' => 'Manage Languages'],

            ['locale_id' => 1, 'title' => 'module.users', 'text' => 'کاربران'],
            ['locale_id' => 2, 'title' => 'module.users', 'text' => 'Users'],

            ['locale_id' => 1, 'title' => 'delete', 'text' => 'حذف'],
            ['locale_id' => 2, 'title' => 'delete', 'text' => 'Delete'],

            ['locale_id' => 1, 'title' => 'active', 'text' => 'فعال'],
            ['locale_id' => 2, 'title' => 'active', 'text' => 'Active'],

            ['locale_id' => 1, 'title' => 'inactive', 'text' => 'غیر فعال'],
            ['locale_id' => 2, 'title' => 'inactive', 'text' => 'Inactive'],

            ['locale_id' => 1, 'title' => 'dashboard', 'text' => 'داشبورد'],
            ['locale_id' => 2, 'title' => 'dashboard', 'text' => 'Dashboard'],

            ['locale_id' => 1, 'title' => 'system', 'text' => 'سیستم'],
            ['locale_id' => 2, 'title' => 'system', 'text' => 'System'],

            ['locale_id' => 1, 'title' => 'modules', 'text' => 'ماژول ها'],
            ['locale_id' => 2, 'title' => 'modules', 'text' => 'Modules'],

            ['locale_id' => 1, 'title' => 'settings', 'text' => 'تنظیمات'],
            ['locale_id' => 2, 'title' => 'settings', 'text' => 'Settings'],
        ];
    }
}
