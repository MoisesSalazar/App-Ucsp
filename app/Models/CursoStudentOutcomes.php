<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoStudentOutcomes extends Model
{
    use HasFactory;

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'curso_id');
    }

    public function studentOutcome()
    {
        return $this->belongsTo('App\Models\StudentOutcome', 'student_outcome_id');
    }
}
