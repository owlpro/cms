<?php

use Modules\Locale\Entities\Locale;
use Modules\Locale\Entities\PanelLiterature;

$locale_id = Locale::where('symbol', 'fa')->first()->id;
return PanelLiterature::where('locale_id', $locale_id)->pluck('text', 'title')->toArray();
