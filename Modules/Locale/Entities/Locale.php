<?php

namespace Modules\Locale\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\Locale query()
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
