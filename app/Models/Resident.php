<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    public $with = ['birth'];

    protected $guarded = [];

    public function birth()
    {
        return $this->belongsTo(ResidentBirth::class, 'resident_birth_id')->withDefault(null);
    }
}