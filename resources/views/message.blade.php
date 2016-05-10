@if(Session::has('flash_message'))
    <div class="alert alert-{{session('flash_message_level')}} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('flash_message')}}
    </div>
@endif