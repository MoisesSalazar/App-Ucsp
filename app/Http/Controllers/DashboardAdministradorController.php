<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use App\Models\CursoProfesor;
use App\Models\StudentOutcome;
use App\Models\CursoStudentOutcomes;

class DashboardAdministradorController extends Controller
{
    public function index(Request $request)
    {
        return view('Administrador.dashboard');
    }
    public function student(Request $request)
    {
        $studentOutcomes = StudentOutcome::all();
        return view('Administrador.StudentO.main')->with(['studentOutcomes' => $studentOutcomes]);
    }
    public function profesores(Request $request)
    {
        $profesores = User::where('tipo', 'Profesor')->get();
        return view('Administrador.Profesores.main')->with(['profesores' => $profesores]);
    }

    public function cursos(Request $request)
    {
        $cursos = Curso::all();
        return view('Administrador.Cursos.main')->with(['cursos' => $cursos]);
    }

    public function asignarstudentoutcomes(Request $request)
    {
        $cursoStudentOutcomes = CursoStudentOutcomes::all();
        $studentOutcomes = StudentOutcome::all();
        $cursos = Curso::all(); //Select * from cursos
        return view('Administrador.Cursos.studentoutcomes')->with(['cursoStudentOutcomes' => $cursoStudentOutcomes, 'studentOutcomes' => $studentOutcomes, 'cursos' => $cursos]);
    }

    public function asignarstudentoutcomescrear(Request $request)
    {
        $id_curso = $request->id_curso;
        $id_student_outcome = $request->id_student_outcome;

        $cursoStudentOutcomes = new CursoStudentOutcomes();
        $cursoStudentOutcomes->curso_id = $id_curso;
        $cursoStudentOutcomes->student_outcome_id = $id_student_outcome;
        $cursoStudentOutcomes->save();
        return redirect()->back();
    }

    public function asignarprofesor(Request $request)
    {
        $curso_profesores = CursoProfesor::all();
        $profesores = User::where('tipo', 'Profesor')->get();
        $cursos = Curso::all(); //Select * from cursos
        return view('Administrador.Cursos.profesor')->with(['profesores' => $profesores, 'cursos' => $cursos, 'curso_profesores' => $curso_profesores]);
    }

    public function asignarprofesorcrear(Request $request)
    {
        $id_curso = $request->id_curso;
        $id_profesor = $request->id_profesor;

        $cursoProfesor = new CursoProfesor();
        $cursoProfesor->curso_id = $id_curso;
        $cursoProfesor->profesor_id = $id_profesor;
        $cursoProfesor->save();
        
        return redirect()->back();
    }
}
