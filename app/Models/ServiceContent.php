<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    protected $fillable = [
        'service_slug',
        'content_type',
        'content',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Scope to get all content for a given slug, ordered.
     */
    public function scopeForSlug($query, string $slug)
    {
        return $query->where('service_slug', $slug)->orderBy('order')->orderBy('id');
    }
}
