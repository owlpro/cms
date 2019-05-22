<?php

namespace Modules\Locale\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\SiteLiterature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\SiteLiterature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\SiteLiterature query()
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
