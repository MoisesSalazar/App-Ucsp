@extends('Plantilla.main')

@section('link')
    <a href="{{ route('profesor.dashboard') }}" class="logo-wrapper" title="Home">
        <span class="sr-only">Home</span>
        <span class="icon logo" aria-hidden="true" style="background-size: cover; border-radius:15px;"></span>
        <div class="logo-text">
            <span class="logo-title">UCSP</span>
            <span class="logo-subtitle">Dashboard</span>
        </div>
    </a>
@endsection
@section('sidebar')
    @include('Profesor.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="main-title">Codigo : {{ $curso->id }}</h2>
                <h2 class="main-title">Curso: {{ $curso->curso->nombre }}</h2>
                <button id="addQuestion" class="btn btn-primary">Agregar pregunta</button>
                <br>
                <button id="saveQuestions" class="btn btn-success mt-3">Guardar</button>
            </div>
            <div class="col-12">
                <div id="questionsContainer" class="mt-3 p-3"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#examen').addClass('active');
    </script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
    <script>
        const curso_profesor_id = @json($curso->id);
        var json_recuperado = JSON.parse(@json($curso->json_preguntas)); // Parsea el JSON
        var studentOutcomes = @json($curso->curso->SOs());

        console.log(json_recuperado);
        console.log(curso_profesor_id);
        window.onload = function() {
            var questionsContainer = document.getElementById('questionsContainer');
            json_recuperado.forEach(function(pregunta, index) {
                var questionContainer = document.createElement('div');
                questionContainer.className = 'mb-3 row border rounded p-3';
                questionContainer.style.backgroundColor = getRandomPastelColor();

                // Crea los checkboxes para los resultados del estudiante
                var checkboxes = '';
                for (var id in studentOutcomes) {
                    checkboxes += '<label><input type="checkbox" id="ss' + id +
                        '" name="studentOutcome" value="' + id + '"> ' +
                        'S' + id +
                        '</label>';
                }

                questionContainer.innerHTML = `
                <div class="col-6">
                    <input type="text" name="question" placeholder="Enunciado de la pregunta" class="form-control mb-2" value="${pregunta.question}">
                    <input type="text" name="note" placeholder="Nota" class="form-control mb-2" value="${pregunta.note}">
                    ` + checkboxes + `
                    <input type="file" name="image" class="form-control mb-2">
                    <button class="btn btn-danger mt-2">Eliminar pregunta</button>
                </div>
                <div class="col-6 text-center">
                    <img src="${pregunta.image}" class="img-preview" style="max-height: 200px;">
                </div>
            `;
                questionsContainer.appendChild(questionContainer);

                // Marca los checkboxes que corresponden a la pregunta actual
                pregunta.studentOutcome.forEach(function(so) {
                    var checkbox = questionContainer.querySelector(`#ss${so}`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });

                questionContainer.querySelector('input[type="file"]').addEventListener('change', function(e) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        questionContainer.querySelector('.img-preview').src = event.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                });

                questionContainer.querySelector('.btn-danger').addEventListener('click', function() {
                    questionsContainer.removeChild(questionContainer);
                });
            });
        };

        var questionsContainer = document.getElementById('questionsContainer');
        Sortable.create(questionsContainer);
        var checkboxes = '';
        for (var id in studentOutcomes) {
            checkboxes += '<label><input type="checkbox" name="studentOutcome" value="' + id + '"> ' + 'S' + id +
                '</label>';
        }

        document.getElementById('addQuestion').addEventListener('click', function() {
            var questionContainer = document.createElement('div');
            questionContainer.className = 'mb-3 row border rounded p-3';
            questionContainer.style.backgroundColor = getRandomPastelColor();
            questionContainer.innerHTML = `
                <div class="col-6">
                    <input type="text" name="question" placeholder="Enunciado de la pregunta" class="form-control mb-2">
                    <input type="text" name="note" placeholder="Nota" class="form-control mb-2">
                    ` + checkboxes + `
                    <input type="file" name="image" class="form-control mb-2">
                    <button class="btn btn-danger mt-2">Eliminar pregunta</button>
                </div>
                <div class="col-6 text-center">
                    <img src="" class="img-preview" style="max-height: 200px;">
                </div>
            `;
            questionsContainer.appendChild(questionContainer);
            actualizarExamen(); // Llama a la función actualizarExamen cada vez que se agrega una pregunta

            questionContainer.querySelector('input[type="file"]').addEventListener('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    questionContainer.querySelector('.img-preview').src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            });

            questionContainer.querySelector('.btn-danger').addEventListener('click', function() {
                questionsContainer.removeChild(questionContainer);
            });
        });

        function getRandomPastelColor() {
            var hue = Math.floor(Math.random() * 360);
            return 'hsl(' + hue + ', 100%, 87.5%)';
        }
    </script>
    <script>
        function generateQuestionsJson() {
            var questionContainers = Array.from(questionsContainer.children);
            var totalNote = 0;

            var promises = questionContainers.map(function(questionContainer) {
                return new Promise(function(resolve, reject) {
                    var question = questionContainer.querySelector('input[name="question"]').value;
                    var note = questionContainer.querySelector('input[name="note"]').value;
                    var studentOutcome = Array.from(questionContainer.querySelectorAll(
                        'input[name="studentOutcome"]:checked')).map(function(checkbox) {
                        return checkbox.value;
                    });
                    var image = questionContainer.querySelector('input[name="image"]').files[0];
                    var imageBase64 = '';
                    if (image) {
                        var reader = new FileReader();
                        reader.readAsDataURL(image);
                        reader.onload = function() {
                            imageBase64 = reader.result;
                            resolve({
                                question: question,
                                note: note,
                                studentOutcome: studentOutcome,
                                image: imageBase64
                            });
                        };
                        reader.onerror = function(error) {
                            console.log('Error: ', error);
                            reject(error);
                        };
                    } else {
                        resolve({
                            question: question,
                            note: note,
                            studentOutcome: studentOutcome,
                            image: imageBase64
                        });
                    }
                    totalNote += Number(note);
                });
            });

            return Promise.all(promises).then(function(results) {
                return {
                    json: JSON.stringify(results),
                    totalNote: totalNote
                };
            });
        }
        var json = null;
    </script>
    <script>
        function actualizarExamen() {
            generateQuestionsJson().then(function(result) {
                json = result.json;
                console.log(json);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                var url = '{{ route('profesor.examen.actualizar', '') }}/' + curso_profesor_id;
                console.log(url);
                console.log(curso_profesor_id);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        json: json
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });

            });
        }
        document.getElementById('saveQuestions').addEventListener('click', function() {
            generateQuestionsJson().then(function(result) {
                json = result.json;
                actualizarExamen();
                console.log(json);
                if (result.totalNote !== 20) {
                    alert('La suma de las notas no es igual a 20');
                }
            });
        });
    </script>
@endsection
