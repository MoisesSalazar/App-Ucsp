<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOutcome extends Model
{
    use HasFactory;
    // En el modelo StudentOutcome
    public function cursoStudentOutcomes()
    {
        return $this->hasMany('App\Models\CursoStudentOutcomes', 'student_outcome_id');
    }
}
