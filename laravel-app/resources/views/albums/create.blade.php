<!DOCTYPE html>
<html>
<head>
    @include('template.index')
</head>
<body>
    @include('template.navbar')
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h4 class="card-title"> Agregar Álbum </h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-end">
                        <a class="btn btn-primary waves-effect" href="{{ route('album') }}">
                            <i class="fas fa-arrow-left"></i> Regresar
                        </a>
                    </div>
                </div>
                <hr>
                <!-- Notificacions / Messages -->
                <div class="col-md-12">
                    @include('template.messages')
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5> <i class="fas fa-file-invoice"></i> Información del álbum </h5>
                            <form method="POST" action="{{ route('album_store') }}">
                                @csrf
                                <div class="row">
                                    <!-- Titulo -->
                                    <div class="col-md-6">
                                        <label class="label-form" for="input"> Título: </label>
                                        <input type="text" class="form-control" name="title" placeholder="Nombre del álbum" required>
                                        <small class="display_none color_red" name="sm-title"> * Campo requerido </small>
                                    </div>
                                    <!-- Artista -->
                                    <div class="col-md-6">
                                        <label class="label-form" for="artista"> Artista: </label>
                                        <select class="form-select" name="artist">
                                            <option value="" selected disabled> Seleccione un artista </option>
                                            @foreach( $artists as $artist )
                                                <option value="{{ $artist->id }}">
                                                    {{ $artist->alias }} | {{ $artist->name }} {{ $artist->lastname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="display_none color_red" name="sm-artist"> * Campo requerido </small>
                                    </div>
                                    <!-- Lanzamiento -->
                                    <div class="col-md-6">
                                        <label class="label-form" for="date"> Fecha de lanzamiento: </label>
                                        <input type="date" class="form-control" name="date" required>
                                        <small class="display_none color_red" name="sm-date"> * Campo requerido </small>
                                    </div>
                                    <!-- Género -->
                                    <div class="col-md-6">
                                        <label class="label-form" for="input"> Género: </label>
                                        <input type="text" class="form-control" name="genre" placeholder="Pop, rock, electrónica, etc" required>
                                        <small class="display_none color_red" name="sm-genre"> * Campo requerido </small>
                                    </div>
                                    <!-- Descripción -->
                                    <div class="col-md-12">
                                        <label class="label-form" for="input"> Descripción: </label>
                                        <textarea class="form-control" rows="2" name="description"
                                            placeholder="Información sobre el álbum o descripción (opcional)"></textarea>
                                    </div>
                                    <!-- Portada -->
                                    <!-- <div class="col-md-12">
                                        <label class="label-form" for="input"> Portada: </label>
                                        <input type="file" class="form-control">
                                    </div> -->
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h5> <i class="fas fa-music"></i> Canciones </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" name="songs">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody name="tb-songs-body">

                                        </tbody>
                                      </table>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-success" name="modal-add-song" data-bs-toggle="modal" data-bs-target="#addSong">
                                        <i class="fas fa-plus"></i> Agregar canción
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-dark" name="create_album" disabled> <i class="fas fa-certificate"></i> Crear álbum </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('albums.modals')
    @include('template.scripts')
    <script src="{{ url('assets/js/albums/albums.js') }}"></script>
</body>
</html>
