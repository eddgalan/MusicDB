function showMsgDeleteSong(id, title) {
    $("p[name='msg-delete']").empty();
    let msg = "¿Está seguro que desea eliminar la canción '<strong>"+
        title + "</strong>'?";
    $("p[name='msg-delete']").append(msg);
    $("button[name='btn-delete-song']").removeAttr('disabled');
    $("button[name='btn-cancel-delete-song']").removeAttr('disabled');
    $("input[name='song_id']").val(id);
}
