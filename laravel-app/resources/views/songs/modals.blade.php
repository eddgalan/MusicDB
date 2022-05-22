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
                                <input type="hidden" name="id">
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
