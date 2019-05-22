<?php

Route::get('/', 'LocalePanelController@locales');
Route::get('/locales', 'LocalePanelController@locales')->name('locale.locales');
Route::post('/save', 'LocalePanelController@locale_save')->name('locale.save');
Route::get('/remove/{id}', 'LocalePanelController@locale_remove')->name('locale.remove');



Route::get('/panel_lang', 'LocalePanelController@panel_lang')->name('locale.panel');
Route::post('/save_panel_lang', 'LocalePanelController@save_panel_lang')->name('locale.panel.save');
Route::get('/remove_panel_lang/{title}', 'LocalePanelController@remove_panel_lang')->name('locale.panel.remove');


Route::get('/site_lang', 'LocalePanelController@site_lang')->name('locale.site_lang');

