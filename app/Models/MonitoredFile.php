<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoredFile extends Model
{
    protected $fillable = ['filename', 'path', 'detected_at'];
}
