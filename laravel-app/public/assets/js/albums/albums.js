let arraySongs = [];
let count = 0;

$(document).ready(function() {
    $('.jquery-data-table').dataTable( {
        ajax: "../../../api/getalbums",
        columns: [
            {
                data: 'id',
                class: 'text-center'
            },
            {
                data: 'pathimg'
            },
            {
                data: 'title'
            },
            {
                data: 'alias'
            },
            {
                data: 'genre',
                class: 'text-center'
            },
            {
                data: 'date',
                class: 'text-center'
            },
            {
                data: 'id',
                render: function(data, type) {
                    return `
                        <div class="text-center">
                            <div class="btn-group btn-group-sm text-center">
                                <a class="btn btn-primary" href="../../../albums/`+ data +`">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" onclick="setAlbumId(`+ data +`)"
                                data-bs-toggle="modal" data-bs-target="#deleteAlbum">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                }
            },
        ]
    });
    /* ..:: btn que muestra el modal para agregar canción ::.. */
    $("button[name='modal-add-song']").click( function() {
        $("small[name='sm-song']").addClass("display_none");
    });
    /* ..:: btn agregar canción ::.. */
    $("button[name='add_song']").click( function() {
        let title = $("input[name='title_song']").val();
        let pathvideo = $("input[name='pathvideo']").val();
        let pathstream1 = $("input[name='pathstream1']").val();
        let pathstream2 = $("input[name='pathstream2']").val();
        if( title ) {
            $("small[name='sm-title-song']").addClass("display_none");
            let song = {
                'index': count,
                'title': title,
                'pathvideo': pathvideo,
                'pathstream1': pathstream1,
                'pathstream2': pathstream2,
            };
            arraySongs.push(song);
            create_table();
            crear_inputs_new_song();
            count++;
            $("button[name='create_album']").removeAttr('disabled');
        } else {
            $("small[name='sm-title-song']").removeClass("display_none");
        }
    });
    /* ..:: btn editar canción ::.. */
    $("button[name='edit_song']").click( function() {
        let title = $("input[name='title_song_edit']").val();
        let pathvideo = $("input[name='pathvideo_edit']").val();
        let pathstream1 = $("input[name='pathstream1_edit']").val();
        let pathstream2 = $("input[name='pathstream2_edit']").val();
        let index = $("input[name='index']").val();
        if( title ) {
            $("small[name='sm-title-song-edit']").addClass("display_none");
            arraySongs[index].title = title;
            arraySongs[index].pathvideo = pathvideo;
            arraySongs[index].pathstream1 = pathstream1;
            arraySongs[index].pathstream2 = pathstream2;
            create_table();
            $("small[name='sm-song-edit']").removeClass("display_none");
        } else {
            $("small[name='sm-title-song-edit']").removeClass("display_none");
            $("small[name='sm-song-edit']").addClass("display_none");
        }
    });
    /* ..:: btn create album ::.. */
    $("button[name='create_album']").click( function() {
        let title = $("input[name='title']").val();
        let artist = $("select[name='artist']").val();
        let date = $("input[name='date']").val();
        let genre = $("input[name='genre']").val();
        let description = $("textarea[name='description']").val();

        if( title ) {
            $("small[name='sm-title']").addClass('display_none');
        } else {
            $("small[name='sm-title']").removeClass('display_none');
        }

        if( artist ) {
            $("small[name='sm-artist']").addClass('display_none');
        } else {
            $("small[name='sm-artist']").removeClass('display_none');
        }

        if( date ) {
            $("small[name='sm-date']").addClass('display_none');
        } else {
            $("small[name='sm-date']").removeClass('display_none');
        }

        if( genre ) {
            $("small[name='sm-genre']").addClass('display_none');
        } else {
            $("small[name='sm-genre']").removeClass('display_none');
        }

        if( title && artist && date && genre ) {
            if( arraySongs.length > 0 ) {
                let token = $("input[name='_token']").val();
                $(this).attr("disabled", "disabled");
                let data = {
                    _token: token,
                    title: title,
                    artist: artist,
                    date: date,
                    genre: genre,
                    description: description,
                    songs: arraySongs
                };
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../../../albums/store',
                    data: data,
                    success: function(resp) {
                        window.location.href = '../../../albums';
                    },
                    error : function(xhr, status) {
                        window.location.reload();
                    }
                });
            } else {

            }
        }

    });

});

function setAlbumId(id) {
    $("input[name='id']").val(id);
}

function deleteSong(index) {
    let new_songs = [];
    for( let song of arraySongs ) {
        if( song.index != index ) {
            new_songs.push(song);
        }
    }
    arraySongs = new_songs;
    create_table();
    if( arraySongs.length != 0 ) {
        $("button[name='create_album']").removeAttr('disabled');
    } else {
        $("button[name='create_album']").attr('disabled', 'disabled');
    }
}

function create_table() {
    let body_table = $("tbody[name='tb-songs-body']");
    body_table.empty();
    let rows = "";
    for( let song of arraySongs ) {
        rows += `<tr>
          <td>`+ song.title +`</td>
          <td>
              <div class="text-end">
                  <div class="btn-group btn-group-sm text-center">
                      <button type="button" class="btn btn-primary" onclick="showSong(`+ song.index +`)" data-bs-toggle="modal" data-bs-target="#editSong">
                          <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger" onclick="deleteSong(`+ song.index +`)">
                          <i class="fas fa-trash"></i>
                      </button>
                  </div>
              </div>
          </td>
        </tr>
        `;
    }
    body_table.append(rows);
}

function showSong(index) {
    for( let song of arraySongs ) {
        if( song.index == index ) {
            $("input[name='index']").val(song.index);
            $("input[name='title_song_edit']").val(song.title);
            $("input[name='pathvideo_edit']").val(song.pathvideo);
            $("input[name='pathstream1_edit']").val(song.pathstream1);
            $("input[name='pathstream2_edit']").val(song.pathstream2);
            break;
        }
    }
    $("small[name='sm-song-edit']").addClass("display_none");
}

function crear_inputs_new_song() {
    $(".new_song").val('');
    $("small[name='sm-song']").removeClass("display_none");
}


function getArtistData(id) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '../../../api/artists/'+ id,
        success: function(resp) {
            let artist = resp.data;
            $("input[name='id'").val(artist.id);
            $("input[name='name'").val(artist.name);
            $("input[name='lastname'").val(artist.lastname);
            $("input[name='alias'").val(artist.alias);
            $("textarea[name='description'").val(artist.description);
            $("input[name='web_site'").val(artist.web_site);
            $("img[name='artist_img']").attr('src', artist.pathimg.replace('public', 'storage'));
        }
    });
}

function showMsgDelete(id){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '../../../api/artists/'+ id,
        success: function(resp) {
            let artist = resp.data;
            let msg_del = "¿Seguro que desea eliminar el Artista <strong>"+ artist.name +"</strong>?. "+
                "Todos los álbumes y canciones del artista también se eliminaran.";
            $("input[name='id'").val(artist.id);
            $("p[name='msg-delete'").html(msg_del);
        }
    });
}
