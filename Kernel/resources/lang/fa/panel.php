<?php

use App\InternalModels\Locale\Locale;
use App\InternalModels\Locale\PanelLiterature;

$locale_id = Locale::where('symbol','fa')->first()->id;
return PanelLiterature::where('locale_id',$locale_id)->pluck('text', 'title')->toArray();
