$(document).ready(function() {
    $('.jquery-data-table').dataTable( {
        ajax: "../../../api/getsongs",
        columns: [
            {
                data: 'id',
                class: 'text-center'
            },
            {
                data: 'title',
                class: 'text-center'
            },
            {
                data: 'artist',
                class: 'text-center'
            },
            {
                data: 'album_name',
                class: 'text-center'
            },
            {
                data: 'id',
                render: function(data, type) {
                    return `
                        <div class="text-center">
                            <div class="btn-group btn-group-sm text-center">
                                <button type="button" class="btn btn-primary" onclick="getArtistData(`+ data +`)"
                                data-bs-toggle="modal" data-bs-target="#editArtist">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" onclick="showMsgDelete(`+ data +`)"
                                data-bs-toggle="modal" data-bs-target="#deleteArtist">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                }
            },
        ]
    });
    $("select[name='artista']").change( function() {
        let artistId = $(this).val();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '../../../api/getAlbumsByArtist/'+ artistId,
            success: function(resp) {
                let albums = resp.data;
                let select = $("select[name='album_id']");
                select.empty();
                let options = `<option value="0" selected disabled> Seleccione un álbum </option>`;
                for( let album of albums ) {
                    options += `<option value="`+ album.id +`">`+ album.title +`</option>`;
                }
                select.append(options);
            }
        });
    });
});

function showMsgDeleteSong(id, title) {
    $("p[name='msg-delete']").empty();
    let msg = "¿Está seguro que desea eliminar la canción '<strong>"+
        title + "</strong>'?";
    $("p[name='msg-delete']").append(msg);
    $("button[name='btn-delete-song']").removeAttr('disabled');
    $("button[name='btn-cancel-delete-song']").removeAttr('disabled');
    $("input[name='song_id']").val(id);
}

function showSong(id) {
    let token = $("input[name='_token']");
    $("input[name='song_id']").val(id);
    $("button[name='save_changes_song'").attr("disabled", "disabled");
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: token,
        url: '../../../api/songs/'+ id,
        success: function(resp) {
            let song = resp.data;
            $("input[name='title_song'").val(song.title);
            $("input[name='pathvideo'").val(song.path_video);
            $("input[name='pathstream1'").val(song.path_stream1);
            $("input[name='pathstream2'").val(song.path_stream2);
            $(".editSong").removeAttr("disabled");
            $("button[name='save_changes_song'").removeAttr("disabled");
        },
        error : function(xhr, status) {
            $(".editSong").attr("disabled", "disabled");
        }
    });
}
