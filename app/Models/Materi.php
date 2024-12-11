<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function subjectTeacher()
    {
        return $this->belongsTo(SubjectTeacher::class, 'pengampu_id');
    }
}
