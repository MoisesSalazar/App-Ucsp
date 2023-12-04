<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\CursoProfesor;

class DashboardProfesorController extends Controller
{
    public function index(Request $request)
    {
        return view('Profesor.dashboard');
    }

    public function examen(Request $request)
    {
        $profesor_id = auth()->user()->id;
        $cursos = CursoProfesor::where('profesor_id', $profesor_id)->get();
        return view('Profesor.Examen.main')->with('cursos', $cursos);
    }

    public function exameneditar(Request $request, $id)
    {
        $curso = CursoProfesor::find($id);
        return view('Profesor.Examen.editar')->with('curso', $curso);
    }

    public function examenActualizar(Request $request, $id)
    {
        $examen = CursoProfesor::find($id);
        $examen->json_preguntas = $request->json;
        $examen->save();
        return response()->json(['success' => true, 'message' => 'Conexión exitosa', 'data' => $request->json]);
    }

    public function notas(Request $request)
    {
        $profesor_id = auth()->user()->id;
        $cursos = CursoProfesor::where('profesor_id', $profesor_id)->get();
        return view('Profesor.Nota.main')->with('cursos', $cursos);
    }

    public function notaeditar(Request $request, $id)
    {
        $curso = CursoProfesor::find($id);
        $preguntas = json_decode($curso->json_preguntas, true);
        return view('Profesor.Nota.editar')->with('curso', $curso)->with('preguntas', $preguntas);
    }
}
