<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoProfesor extends Model
{
    use HasFactory;
    protected $table = 'curso_profesores';


    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'curso_id');
    }

    public function profesor()
    {
        return $this->belongsTo('App\Models\User', 'profesor_id');
    }
}
