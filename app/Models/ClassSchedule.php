<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = ['pdf_path', 'uploaded_at'];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    /**
     * Get the single (latest) class schedule record, or null if none exists.
     */
    public static function current(): ?self
    {
        return static::latest()->first();
    }
}
