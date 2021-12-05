

<div class="container-fluid">
    <div class="row">
        @if(session('message'))
            <div class="col-12 mt_100 alert alert-success text-center p-2">
                {{session('message')}}
            </div> 
        @endif
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        @if(session('alert'))
            <div class="col-12 mt_100 alert alert-danger text-center p-2">
                {{session('alert')}}
            </div> 
        @endif
    </div>
</div>