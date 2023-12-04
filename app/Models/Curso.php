<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public function cursoStudentOutcomes()
    {
        return $this->hasMany('App\Models\CursoStudentOutcomes', 'curso_id');
    }

    public function SOs()
    {
        return $this->cursoStudentOutcomes->mapWithKeys(function ($cursoStudentOutcome) {
            return [$cursoStudentOutcome->studentOutcome->id => $cursoStudentOutcome->studentOutcome->description];
        })->toArray();
    }
}
