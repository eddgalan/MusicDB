$(document).ready(function() {
    $('.jquery-data-table').dataTable( {
        ajax: "../../../api/artists",
        columns: [
            {
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'lastname'
            },
            {
                data: 'alias'
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
                                <button type="button" class="btn btn-danger" onclick="delete(`+ data +`)"
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
});

function clearFields(){
    $("input[name='name'").val('');
    $("input[name='lastname'").val('');
    $("input[name='alias'").val('');
    $("textarea[name='description'").val('');
    $("input[name='web_site'").val('');
}

function getArtistData(id) {
    // $.ajax({
    //     type: 'GET',
    //     dataType: 'json',
    //     url: '../../../api/artists/'+ id,
    //     success: function(resp) {
    //         let artist = resp.data;
    //         $("input[name='name'").val(artist.name);
    //         $("input[name='lastname'").val(artist.lastname);
    //         $("input[name='alias'").val(artist.alias);
    //         $("textarea[name='description'").val(artist.description);
    //         $("input[name='web_site'").val(artist.web_site);
    //         $("img[name='artist_img']").attr('src', artist.pathimg.replace('public', 'storage'));
    //     }
    // });
}
