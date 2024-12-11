<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function attitudeReport()
    {
        return $this->hasMany(AttitudeReport::class, 'tahun_ajaran_id');
    }

    public function teachingSchedule()
    {
        return $this->hasMany(TeachingSchedule::class, 'tahun_ajaran_id');
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'tahun_ajaran_id');
    }
}
