<?php

Route::get(env('ADMINISTRATOR_PANEL_URL','panel'),'BasePanelController@index')->name('panel');

// Change Locale Route
Route::get('/changeLocale/{locale}','BasePanelController@changeLocale')->name('changeLocale');
