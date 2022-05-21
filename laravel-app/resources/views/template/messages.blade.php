@if( isset($errors) && count($errors)>0 )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if( Session::get('success', false) )
    <?php $data = Session::pull('success'); ?>
    @if( is_array($data) )
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul class="list-unstyled mb-0">
                @foreach( $data as $message )
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ $data }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endif
