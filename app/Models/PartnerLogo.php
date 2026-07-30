<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLogo extends Model
{
    protected $fillable = ['name', 'logo_path', 'is_active', 'order'];

    /**
     * Scope: only active logos, sorted by order column.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
