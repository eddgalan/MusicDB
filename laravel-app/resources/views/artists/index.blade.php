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
                        <h4 class="card-title"> Artistas </h4>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-end">
                        <button type="button" class="btn btn-success waves-effect"
                            data-bs-toggle="modal" data-bs-target="#newArtist" onclick="clearFields()">
                            <i class="fas fa-plus"></i> Agregar Artista
                        </button>
                    </div>
                </div>
                <hr>
                <!-- Notificacions / Messages -->
                <div class="col-md-12">
                    @include('template.messages')
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-hover w-100 pt-3 jquery-data-table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center"> Id </th>
                                <th class="text-center"> Nombre </th>
                                <th class="text-center"> Apellido </th>
                                <th class="text-center"> Alias </th>
                                <th class="text-center"> Opciones </th>
                            </tr>
                        </thead>
                      </table>
                </div>
            </div>
        </div>
    </div>
    @include('artists.modals')
    @include('template.scripts')
    <script src="{{ url('assets/js/artists/artists.js') }}"></script>
</body>
</html>
