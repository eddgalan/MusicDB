<div class="modal" id="newArtist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Agregar Artista </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('artists_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-12">
                            <label for="name" class="form-label"> Nombre: </label>
                            <input type="text" class="form-control" name="name" autocomplete="false" required>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-12">
                            <label for="lastname" class="form-label"> Apellidos: </label>
                            <input type="text" class="form-control" name="lastname" autocomplete="false">
                        </div>
                        <!-- Alias -->
                        <div class="col-md-12">
                            <label for="alias" class="form-label"> Alias: </label>
                            <input type="text" class="form-control" name="alias" placeholder="Nombre o apodo" autocomplete="false">
                        </div>
                        <!-- Descripción -->
                        <div class="col-md-12">
                            <label for="description" class="form-label"> Descripción: </label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Breve descripción o presentación del artista"></textarea>
                        </div>
                        <!-- Sitio web -->
                        <div class="col-md-12">
                            <label for="web_site" class="form-label"> Sitio web: </label>
                            <input type="text" class="form-control" name="web_site" placeholder="Sitio web o red social" autocomplete="false">
                        </div>
                        <!-- Img -->
                        <div class="col-md-12">
                            <label for="img" class="form-label"> Imagen o foto: </label><br>
                            <input type="file" class="form-control" name="img" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Agregar </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cerrar </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Artist -->
<div class="modal" id="editArtist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Editar Artista </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('artists_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Artists Id -->
                        <input type="hidden" name="id">
                        <!-- Imagen -->
                        <div class="col-md-12">
                            <img class="img-fluid w-100" src="" name="artist_img">
                        </div>
                        <!-- Nombre -->
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label"> Nombre: </label>
                            <input type="text" class="form-control" name="name" autocomplete="false" required>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-12">
                            <label for="lastname" class="form-label"> Apellidos: </label>
                            <input type="text" class="form-control" name="lastname" autocomplete="false">
                        </div>
                        <!-- Alias -->
                        <div class="col-md-12">
                            <label for="alias" class="form-label"> Alias: </label>
                            <input type="text" class="form-control" name="alias" placeholder="Nombre o apodo" autocomplete="false">
                        </div>
                        <!-- Descripción -->
                        <div class="col-md-12">
                            <label for="description" class="form-label"> Descripción: </label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Breve descripción o presentación del artista"></textarea>
                        </div>
                        <!-- Sitio web -->
                        <div class="col-md-12">
                            <label for="web_site" class="form-label"> Sitio web: </label>
                            <input type="text" class="form-control" name="web_site" placeholder="Sitio web o red social" autocomplete="false">
                        </div>
                        <!-- Img -->
                        <div class="col-md-12">
                            <label for="img" class="form-label"> Cambiar imagen o foto: </label><br>
                            <input type="file" class="form-control" name="img">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Guardar </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cancelar </button>
                </div>
            </form>
        </div>
    </div>
</div>
