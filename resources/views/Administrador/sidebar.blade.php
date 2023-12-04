<ul class="sidebar-body-menu">
    <li>
        <a href="{{ route('administrador.dashboard') }}" id="dashboard"><span class="icon home"
                aria-hidden="true"></span>Dashboard</a>
    </li>
    <span class="system-menu__title">Administrativo</span>
    <li>
        <a href="{{ route('administrador.student') }}" id="studento"><span class="icon edit"
                aria-hidden="true"></span>Student Outcomes</a>
    </li>
    <li>
        <a href="{{ route('administrador.profesores') }}" id="profesores"><span class="icon user-3"
                aria-hidden="true"></span>Profesores</a>
    </li>
    <li>
        <a class="show-cat-btn" href="#" id="cursos">
            <span class="icon folder" aria-hidden="true"></span>Cursos
            <span class="category__btn transparent-btn" title="Open list">
                <span class="sr-only">Open list</span>
                <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
        </a>
        <ul class="cat-sub-menu">
            <li>
                <a href="{{ route('administrador.cursos') }}" id="cursosl">Listar</a>
            </li>
            <li>
                <a href="{{ route('administrador.asignarstudentoutcomes') }}" id="cursosa">Asignar S.O.</a>
            </li>
            <li>
                <a href="{{ route('administrador.asignarprofesor') }}" id="cursoprofesor">Asignar Profesor</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="show-cat-btn" href="#">
            <span class="icon paper" aria-hidden="true"></span>Semestre
            <span class="category__btn transparent-btn" title="Open list">
                <span class="sr-only">Open list</span>
                <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
        </a>
        <ul class="cat-sub-menu">
            <li>
                <a href="#">Listar</a>
            </li>
            <li>
                <a href="#">Grupos</a>
            </li>
        </ul>
    </li>
</ul>
<span class="system-menu__title">Académico</span>
<ul class="sidebar-body-menu">
    <li>
        <a class="show-cat-btn" href="#">
            <span class="icon category" aria-hidden="true"></span>Malla Curricular
            <span class="category__btn transparent-btn" title="Open list">
                <span class="sr-only">Open list</span>
                <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
        </a>
        <ul class="cat-sub-menu">
            <li>
                <a href="#">Listar</a>
            </li>
            <li>
                <a href="#">Asignar Cursos</a>
            </li>
        </ul>
    </li>
</ul>
