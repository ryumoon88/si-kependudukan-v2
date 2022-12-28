<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Submission extends Model
{
    use HasFactory, BelongsToThrough;

    protected $guarded = [];

    public $with = ['submitter', 'service', 'serviceCategory'];

    public function submitter()
    {
        return $this->belongsToThrough(ResidentBirth::class, Resident::class, null, '', [Resident::class => 'submitter_id']);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceCategory()
    {
        return $this->belongsToThrough(ServiceCategory::class, Service::class);
    }
}