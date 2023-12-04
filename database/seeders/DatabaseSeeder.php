<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Registros de profesores
        // Registros de profesores

        $profesores = [
            ['name' => 'Gina Lucia', 'lastname' => 'Muñoz Salas', 'dni' => '12345678', 'codigo_profesor' => 'C12345', 'email' => 'ginalucia.muñozsalas@ucsp.edu.pe'],
            ['name' => 'Marcela', 'lastname' => 'Quispe Cruz', 'dni' => '23456789', 'codigo_profesor' => 'C23456', 'email' => 'marcela.quispecruz@ucsp.edu.pe'],
            ['name' => 'Kelly', 'lastname' => 'Vizconde La Motta', 'dni' => '34567890', 'codigo_profesor' => 'C34567', 'email' => 'kelly.vizcondelamotta@ucsp.edu.pe'],
            ['name' => 'Yessenia Deysi', 'lastname' => 'Yari Ramos', 'dni' => '56789012', 'codigo_profesor' => 'C56789', 'email' => 'yesseniadeysi.yari@ucsp.edu.pe'],
            ['name' => 'Manuel Eduardo', 'lastname' => 'Loaiza Fernández', 'dni' => '78901234', 'codigo_profesor' => 'C78901', 'email' => 'manueleduardo.loaizafernandez@ucsp.edu.pe'],
            ['name' => 'Alvaro Henry', 'lastname' => 'Mamani Aliaga', 'dni' => '89012345', 'codigo_profesor' => 'C89012', 'email' => 'alvarohenry.mamani@ucsp.edu.pe'],
            ['name' => 'Luis Fernando', 'lastname' => 'Díaz Basurco', 'dni' => '90123456', 'codigo_profesor' => 'C90123', 'email' => 'luisfernando.diaz@ucsp.edu.pe'],
            ['name' => 'Daniel Alexis', 'lastname' => 'Gutierrez Pachas', 'dni' => '123435678', 'codigo_profesor' => 'C123445', 'email' => 'danielalexis.gutierrez@ucsp.edu.pe'],
            // Agrega aquí los datos de los demás profesores
            ['name' => 'Neptalí', 'lastname' => 'Menejes Palomino', 'dni' => '12345679', 'codigo_profesor' => 'C12346', 'email' => 'neptali.menejespalomino@ucsp.edu.pe'],
            ['name' => 'Graciela Lecireth', 'lastname' => 'Meza Lovón', 'dni' => '23456790', 'codigo_profesor' => 'C23457', 'email' => 'gracielalecireth.mezalovon@ucsp.edu.pe'],
            ['name' => 'Rensso Victor Hugo', 'lastname' => 'Mora Colque', 'dni' => '34567891', 'codigo_profesor' => 'C34568', 'email' => 'renssovictorhugo.moracolque@ucsp.edu.pe'],
            ['name' => 'José Eduardo', 'lastname' => 'Ochoa Luna', 'dni' => '45678902', 'codigo_profesor' => 'C45679', 'email' => 'joseduardo.ochoaluna@ucsp.edu.pe'],
            ['name' => 'Eddie Rogger', 'lastname' => 'Peralta Aranibar', 'dni' => '56789013', 'codigo_profesor' => 'C56790', 'email' => 'eddierogger.peraltaaranibar@ucsp.edu.pe'],
            ['name' => 'Pablo Julio Omar', 'lastname' => 'Santisteban', 'dni' => '67890124', 'codigo_profesor' => 'C67891', 'email' => 'pablojulioomar.santisteban@ucsp.edu.pe'],
            ['name' => 'Javier Leandro', 'lastname' => 'Tejada Cárcamo', 'dni' => '78901235', 'codigo_profesor' => 'C78902', 'email' => 'javierleandro.tejadacarcamo@ucsp.edu.pe'],
            ['name' => 'Regina Paola', 'lastname' => 'Ticona Herrera', 'dni' => '89012346', 'codigo_profesor' => 'C89013', 'email' => 'reginapaola.ticonaherrera@ucsp.edu.pe'],
            ['name' => 'Yván Jesús', 'lastname' => 'Túpac Valdivia', 'dni' => '90123457', 'codigo_profesor' => 'C90124', 'email' => 'yvanjesus.tupacvaldivia@ucsp.edu.pe'],
        ];


        foreach ($profesores as $profesor) {
            DB::table('users')->insert([
                'name' => $profesor['name'],
                'lastname' => $profesor['lastname'],
                'dni' => $profesor['dni'],
                'codigo' => $profesor['codigo_profesor'],
                'email' => $profesor['email'],
                'password' => Hash::make('1234'), // Contraseña por defecto: 1234 (asegúrate de usar Hash)
                'estado' => 'Activo',
                'tipo' => 'Profesor',
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Moises',
            'lastname' => 'Salazar',
            'dni' => '70602356',
            'codigo' => '181-10-43306',
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('1234'), // Contraseña por defecto: 1234 (asegúrate de usar Hash)
            'estado' => 'Activo',
            'tipo' => 'Administrador',
        ]);

        $studentOutcomes = [
            [
                'outcome_code' => 'SO1',
                'description' => 'Analizar un problema computacional complejo y aplicar los principios computacionales y otras disciplinas relevantes para identificar soluciones.',
            ],
            [
                'outcome_code' => 'SO2',
                'description' => 'Diseñar, implementar y evaluar una solución basada en computación para cumplir con un conjunto determinado de requisitos computacionales en el contexto de las disciplinas del programa.',
            ],
            [
                'outcome_code' => 'SO3',
                'description' => 'Comunicarse efectivamente en diversos contextos profesionales.',
            ],
            [
                'outcome_code' => 'SO4',
                'description' => 'Reconocer las responsabilidades profesionales y hacer juicios informados en el campo profesional de computación con principios éticos.',
            ],
            [
                'outcome_code' => 'SO5',
                'description' => 'Funcionar efectivamente como miembro o líder de un equipo involucrado en actividades apropiadas a la disciplina del programa.',
            ],
            [
                'outcome_code' => 'SO6',
                'description' => 'Aplicar la teoría de la computación y los fundamentos del desarrollo de software para producir soluciones basadas en computación.',
            ],
            [
                'outcome_code' => 'SO7',
                'description' => 'Desarrollar tecnología computacional buscando el bien común, aportando con formación humana, capacidades científicas, tecnológicas y profesionales para solucionar problemas sociales de nuestro entorno.',
            ],
        ];

        DB::table('student_outcomes')->insert($studentOutcomes);


        $cursos = [
            'Programación de Video Juegos',
            'Estructura Discretas I',
            'Comunicación',
            'Metodología del Estudio',
            'Introducción a la Vida Universitaria',
            'Matemática I',
            'Ciencia de la Computación I',
            'Ciencia de la Computación II',
            'Ciencia de la Computación III',
            'Álgebra Abstracta',
            'Arquitectura de Computadores',
            'Programación Competitiva',
            'Estructuras de Datos Avanzadas',
            'Teoría de la Computación',
            'Base de Datos I',
            'Cálculo I',
            'Estadística y Probabilidades',
            'Física Computacional',
            'Análisis y Diseño de Algoritmos',
            'Base de Datos II',
            'Ingeniería de Software II',
            'Metodología de la Investigación en Computación',
            'Liderazgo',
            'Computación en la Sociedad',
            'Interacción Humano Computador',
            'Compiladores',
            'Seguridad en Computación',
            'Computación Paralela y Distribuída',
            'Proyecto Final de Carrera I',
            'Formación de Empresas de Base Tecnológica',
            'Historia de la Cultura',
            'Enseñanza Social de la Iglesia',
            'Análisis de la Realidad Peruana',
            'Inglés Técnico Porfesional',
            'Ética Profesional',
            'Análisis de la Realidad Peruana',
            'Inglés Técnico Porfesional',
        ];

        foreach ($cursos as $curso) {
            DB::table('cursos')->insert([
                'nombre' => $curso,
                'codigo' => 'C' . random_int(1000, 9999), // Genera un código aleatorio
            ]);
        }
    }
}
