<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappQuery extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'project_type',
        'description',
    ];
}
