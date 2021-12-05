<x-layout>
    <div class="container mt_150">
        <div class="row">
            <div class="col-12">
                <h2>{{ __('ui.cestino') }} <i class="fad fa-trash-alt"></i></h2>
            </div>
        </div>
    </div>
    <div class="container  mt-3 mb-5 p-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h3 class="">{{__('ui.annunciRigettati')}}</h3>
                
                @if ($announcements->count()>0)
                <span>
                    <form action="{{route('announcement.destroy.all')}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100 mb-1">{{__('ui.Eliminatutti')}}</button>
                    </form>
                </span>
                @endif
            </div>
        </div>
    <hr>

        @if ($announcements->count()>0)
       
            <div class="row justify-content-center align-item-center">
                @foreach($announcements as $announcement)    
                    <div class="col-9 col-md-3 d-flex justify-content-center flex-column my-3">
                        <div class="card text-center p-4 mb-3 shadow-lg">
                            <h5 data-mdb-toggle="tooltip" data-mdb-html="true" title="{{$announcement->title}}" class="truncate name">{{$announcement->title}}</h5>
                            @switch(Lang::locale())
                                @case('it')
                                    <h6><a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->it}}</a></h6>
                                    @break
                                @case('en')
                                    <h6><a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->en}}</a></h6>
                                    @break
                                @case('es')
                                    <h6><a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->es}}</a></h6>
                                    @break           
                            @endswitch
                            <h6>{{__('ui.prezzo')}} {{$announcement->price}}€</h6>
                            <hr>
                            <p class="text-muted m-0">Creato da: {{$announcement->user->name}}</p>
                            <p class="text-muted m-0">il: {{$announcement->created_at->format('d/m/Y')}}</p>
                            <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary my-1 w-100 bg_main">{{ __('ui.scopri') }}</a>
                            <form action="{{route('revisor.accepted', ['id'=>$announcement->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 mb-1">{{__('ui.ripristina')}}</button>
                            </form>
                            <form action="{{route('announcement.destroy', compact('announcement'))}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger w-100 mb-1">{{__('ui.elimina')}}</button>
                            </form>
                            <a href="{{url()->previous()}}" class="btn btn-dark w-100 ">{{__('ui.indietro')}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
    
        @else
            <div class="container  mb-5">
                <div class="row my-3 shadow-lg p-5 radius-10">
                    <div class="col-12 col-md-6 w-100">
                        <h2 class="text-center">{{__('ui.annuncirigettatiNo')}}</h2>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
</x-layout>