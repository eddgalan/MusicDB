        <!-- Add Song -->
        <div class="modal" id="addSong">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Agregar canción </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('song_store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- Artista -->
                                        <div class="col-md-6">
                                            <label for="artista"> Artista: </label>
                                            <select class="form-select" name="artista" required>
                                                <option value="0" selected disabled> Seleccione un artista </option>
                                                @if( isset($artists) )
                                                    @foreach( $artists as $artist )
                                                        <option value="{{ $artist->id }}"> {{ $artist->alias }} </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <!-- Album -->
                                        <div class="col-md-6">
                                            <label for="album"> Álbum: </label>
                                            <select class="form-select" name="album_id" required>
                                                <option value="0" selected disabled> Seleccione un álbum </option>
                                            </select>
                                        </div>
                                        <!-- Nombre -->
                                        <div class="col-md-6">
                                            <label for="title_song"> Titulo: </label>
                                            <input class="form-control new_song" name="title_song" placeholder="Título o nombre" required>
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
                            <button type="submit" class="btn btn-success" name="add_song"> <i class="fas fa-check"></i> Agregar </button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cerrar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Editar canción POST -->
        <div class="modal" id="editSongAlbum">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Editar canción </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('song_update', isset($song) ? $song->id : '0') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- Canción Id -->
                                        <input type="hidden" name="song_id">
                                        <!-- Nombre -->
                                        <div class="col-md-6">
                                            <label for="title_song"> Titulo: </label>
                                            <input class="form-control editSong" name="title_song" placeholder="Título o nombre" required>
                                        </div>
                                        <!-- URL video -->
                                        <div class="col-md-6">
                                            <label for="pathvideo"> URL video: </label>
                                            <input class="form-control editSong" name="pathvideo" placeholder="Video en línea (opcional)">
                                        </div>
                                        <!-- URL Stream 1 -->
                                        <div class="col-md-6">
                                            <label for="pathstream1"> URL stream 1: </label>
                                            <input class="form-control editSong" name="pathstream1" placeholder="Opción stream 1 (opcional)">
                                        </div>
                                        <!-- URL Stream 2 -->
                                        <div class="col-md-6">
                                            <label for="pathstream2"> URL stream 2: </label>
                                            <input class="form-control editSong" name="pathstream2" placeholder="Opción stream 2 (opcional)">
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
                            <button type="submit" class="btn btn-success" name="save_changes_song" disabled> <i class="fas fa-check"></i> Guardar </button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fas fa-times"></i> Cerrar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Song -->
        <div class="modal" id="showMsgDeleteSong">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Eliminar Canción </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('song_delete', isset($song) ? $song->id : '0' ) }}">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <!-- Song Id -->
                                <input type="hidden" name="song_id">
                                <div class="col-md-12">
                                    <p name='msg-delete'> </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="btn-delete-song" disabled>
                                <i class="fas fa-trash"></i> Si, eliminar
                            </button>
                            <button type="button" class="btn btn-danger" name='btn-cancel-delete-song' data-bs-dismiss="modal" disabled>
                                <i class="fas fa-times"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
