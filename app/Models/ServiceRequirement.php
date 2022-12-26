<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequirement extends Model
{
    use HasFactory;

    protected $cast = [
        'need_file' => 'boolean'
    ];

    protected $guarded = [];
}