<?php

namespace App\InternalModels\Locale;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalModels\Locale\SiteLiterature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalModels\Locale\SiteLiterature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InternalModels\Locale\SiteLiterature query()
 * @mixin \Eloquent
 */
class SiteLiterature extends Model
{
    protected $table = 'locale_site_literature';
    protected $fillable = ['locale_id', 'module', 'title', 'text'];

    public function locale() {
        return $this->belongsTo(Locale::class, 'locale_id', 'id');
    }
}
