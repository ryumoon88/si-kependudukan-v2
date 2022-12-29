<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['submitter', 'service', 'accepted_by'];

    public function submitter()
    {
        return $this->hasOneThrough(Resident::class, User::class, 'resident_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function accepted_by()
    {
        return $this->belongsTo(User::class, 'accepted_by');
    }
}