<x-layout>
    <div class="container mt_150">
        <div class="row">
            <div class="col-12">
                <h2>{{__('ui.dettaglio')}} {{$announcement->title}}</i></h2>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row my-3 shadow-lg p-5 radius-10">
            @if($announcement->images->count()>0)
                <div class="col-12 col-md-6 ">
                
                    <section class="">
                        <!-- Section: Images -->
                        <section class="">
                            <div class="row">
                                @foreach ($announcement->images as $image)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 ">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img src="{{$image->getUrl(180,180)}}" class="w-100"/>
                                            <a href="#!" data-mdb-toggle="modal" data-mdb-target="#modalGallery{{$image->id}}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <!-- Section: Images -->
                    
                        <!-- Section: Modals -->
                        <section class="">
                            <!-- Modal 1 -->
                            @foreach ($announcement->images as $image)
                                <div class="modal fade" id="modalGallery{{$image->id}}" tabindex="-1" aria-labelledby="modalGallery{{$image->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="ratio ratio-1x1">
                                                <img src="{{Storage::url($image->file)}}"  alt="">
                                            </div>                    
                                            <div class="text-center py-3">
                                                <button type="button" class="btn btn-warning bg_sec" data-mdb-dismiss="modal">{{__('ui.chiudi')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        <!-- Section: Modals -->
                    </section>
                </div>
            @elseif (count($announcement->images) == 0)  
                <div class="col-12 col-md-6 mb-4 d-flex align-items-center justify-content-center">
                    <section class="">
                        <!-- Section: Images -->
                        <section class="">
                            <div class="row">    
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-lg-4 col-md-12 mb-4">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img src="/img/placeLogo.jpg" class="w-100"/>
                                            <a href="#!" data-mdb-toggle="modal" data-mdb-target="#modalGallery{{$i}}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                            </a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </section>
                        <!-- Section: Images -->
                    
                    </section>
                    
                    
                </div>
            @endif
            <div class="col-12 col-md-6 d-flex flex-column justify-content-around">
                <div class="px-2 d-flex flex-column ">
                    <h2>{{$announcement->title}}</h2>
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
                        
                    <h5>{{__('ui.prezzo')}} {{$announcement->price}}€</h5>
                </div>
                <hr>
                <div class="px-2">
                    <h5>{{__('ui.descArticolo')}}</h5>
                    <p>{{$announcement->description}}</p>
                </div>
                <hr>
                <div class="px-2 d-flex flex-lg-row flex-column justify-content-between">
                    <p class="text-muted">{{__('ui.creato')}} <a href="{{route('messages.contact', ['user_id' => $announcement->user->id] )}}">{{$announcement->user->name}}</a></p>
                    <p class="text-muted">{{__('ui.il')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                </div>
            </div>
            <div class="col-12 col-md-12 d-flex flex-column justify-content-start align-items-center">
                <a href="{{url()->previous()}}" class="btn mb-5 btn-dark">{{__('ui.indietro')}}</a>
                {{-- <a href="" class="btn w-100 mb-5 btn-dark">Modifica</a> --}}
            </div>
        </div>
    </div>

</x-layout>