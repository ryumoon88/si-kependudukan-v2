<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequirement extends Model
{
    use HasFactory;

    protected $cast = [
        'need_file' => 'boolean'
    ];

    protected $guarded = [];

    public function services()
    {
        return $this->hasManyThrough(Service::class, ServiceHasRequirement::class, secondLocalKey: 'service_id', secondKey: 'id');
    }
}