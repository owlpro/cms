<?php

namespace Modules\Locale\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\PanelLiterature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\PanelLiterature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Locale\Entities\PanelLiterature query()
 * @mixin \Eloquent
 */
class PanelLiterature extends Model
{
    protected $table = 'locale_panel_literature';
    protected $fillable = ['locale_id', 'title', 'text'];

    public function locale() {
        return $this->belongsTo(Locale::class, 'locale_id', 'id');
    }
}
