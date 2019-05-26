<?php


Route::prefix(env('ADMINISTRATOR_PANEL_URL'))->middleware('auth')->group(function() {
    Route::get('/', 'DashboardController@index');

    Route::prefix('dashboard')->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });

    Route::prefix('system')->group(function() {
        Route::get('/', 'SystemController@index')->name('system');
    });

    Route::prefix('module')->group(function() {
        Route::get('/', 'ModuleController@index')->name('module');
    });

    Route::prefix('setting')->group(function() {
        Route::get('/', 'SettingController@index')->name('setting');
    });

});


// Change Locale Route
Route::get('/changeLocale/{locale}', 'BasePanelController@changeLocale')->name('changeLocale');


// locale routes
$localecontroller = "System\LocaleController@";
Route::prefix('/adm/system/locale')->group(function() use($localecontroller) {
    Route::get('/', $localecontroller.'locales');
    Route::get('/locales', $localecontroller.'locales')->name('locale.locales');
    Route::post('/save', $localecontroller.'locale_save')->name('locale.save');
    Route::get('/remove/{id}', $localecontroller.'locale_remove')->name('locale.remove');


    Route::get('/panel_lang', $localecontroller.'panel_lang')->name('locale.panel');
    Route::post('/panel_lang', $localecontroller.'locale_search')->name('locale.panel.search');
    Route::post('/save_panel_lang', $localecontroller.'save_panel_lang')->name('locale.panel.save');
    Route::get('/remove_panel_lang/{title}', $localecontroller.'remove_panel_lang')->name('locale.panel.remove');


    Route::get('/site_lang', $localecontroller.'site_lang')->name('locale.site_lang');
});

