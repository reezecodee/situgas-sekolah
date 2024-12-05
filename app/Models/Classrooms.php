<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(Student::class, 'kelas_id');
    }
}
