@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if( session('success') )
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        <i class="fa-lg fa fa-check"></i>
        {{ session('success') }}
    </div>
@endif