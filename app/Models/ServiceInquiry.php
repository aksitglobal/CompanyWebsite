<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceInquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'service', 'message'];
}
