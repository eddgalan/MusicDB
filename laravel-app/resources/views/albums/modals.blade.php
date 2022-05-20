<!-- Agregar canción -->
<div class="modal" id="addSong">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Agregar canción </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label for="title_song"> Titulo: </label>
                                <input class="form-control new_song" name="title_song" placeholder="Título o nombre">
                                <small class="display_none color_red" name="sm-title-song"> * Este campo es obligatorio </small>
                            </div>
                            <!-- URL video -->
                            <div class="col-md-6">
                                <label for="pathvideo"> URL video: </label>
                                <input class="form-control new_song" name="pathvideo" placeholder="Video en línea (opcional)">
                            </div>
                            <!-- URL Stream 1 -->
                            <div class="col-md-6">
                                <label for="pathstream1"> URL stream 1: </label>
                                <input class="form-control new_song" name="pathstream1" placeholder="Opción stream 1 (opcional)">
                            </div>
                            <!-- URL Stream 2 -->
                            <div class="col-md-6">
                                <label for="pathstream2"> URL stream 2: </label>
                                <input class="form-control new_song" name="pathstream2" placeholder="Opción stream 2 (opcional)">
                            </div>
                            <!-- Msg -->
                            <div class="col-md-12 text-center">
                                <small class="display_none color_green" name="sm-song"> Se agregó la canción </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" name="add_song"> <i class="fas fa-check"></i> Agregar </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cerrar </button>
            </div>
        </div>
    </div>
</div>
<!-- Editar canción -->
<div class="modal" id="editSong">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Editar canción </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Index -->
                            <input type="hidden" name="index">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label for="title_song"> Titulo: </label>
                                <input class="form-control new_song" name="title_song_edit" placeholder="Título o nombre">
                                <small class="display_none color_red" name="sm-title-song-edit"> * Este campo es obligatorio </small>
                            </div>
                            <!-- URL video -->
                            <div class="col-md-6">
                                <label for="pathvideo"> URL video: </label>
                                <input class="form-control new_song" name="pathvideo_edit" placeholder="Video en línea (opcional)">
                            </div>
                            <!-- URL Stream 1 -->
                            <div class="col-md-6">
                                <label for="pathstream1"> URL stream 1: </label>
                                <input class="form-control new_song" name="pathstream1_edit" placeholder="Opción stream 1 (opcional)">
                            </div>
                            <!-- URL Stream 2 -->
                            <div class="col-md-6">
                                <label for="pathstream2"> URL stream 2: </label>
                                <input class="form-control new_song" name="pathstream2_edit" placeholder="Opción stream 2 (opcional)">
                            </div>
                            <!-- Msg -->
                            <div class="col-md-12 text-center">
                                <small class="display_none color_green" name="sm-song-edit"> Se aplicaron los cambios </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" name="edit_song"> <i class="fas fa-check"></i> Guardar </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cerrar </button>
            </div>
        </div>
    </div>
</div>
