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
