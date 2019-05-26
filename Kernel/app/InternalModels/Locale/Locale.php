<?php

namespace App\InternalModels\Locale;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|App\InternalModels\Locale\Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|App\InternalModels\Locale\Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|App\InternalModels\Locale\Locale query()
 * @mixin \Eloquent
 */
class Locale extends Model
{
    protected $table = 'locale_locales';
    protected $fillable = ['symbol', 'title', 'direction', 'active'];

    public function PanelLiterature() {
        return $this->hasMany(PanelLiterature::class, 'locale_id', 'id');
    }

    public function SiteLiterature() {
        return $this->hasMany(SiteLiterature::class, 'locale_id', 'id');
    }
}
