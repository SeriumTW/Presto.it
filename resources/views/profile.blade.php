<x-layout>

    <div class="container mt_150">
        <div class="row">
            <div class="col-12">
                <h2 class=" ">{{__('ui.profilo')}} <i class="fad fa-user-circle"></i></h2>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row my-3 shadow-lg p-5 justify-content-center align-content-center radius-10">
            <div class="col-12 d-flex justify-content-between">
                <a href="{{url()->previous()}}" class="btn btn-dark"><i class="fad fa-arrow-from-right"></i></span> {{ __('ui.indietro') }} </a>
                {{-- <a href="" class="btn btn-success"></span> {{ __('ui.modifica') }} </a> --}}
            </div>   
            <div class="col-12 col-md-6 d-flex justify-content-center align-content-center flex-column p-1 text-center">
                <span class="img-profile fluid d-block mx-auto m-4"></span>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-evenly align-content-center flex-column p-1 text-center">
                <h4 class="m-0">{{ __('ui.nome') }}: {{Auth::user()->name}}</h4>
                <h4 class="m-0">Email: {{Auth::user()->email}}</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 color_sec"><i class="fad fa-alarm-exclamation"></i> {{ __('ui.annunciAttesa') }}</div> 
                @if ($announcementsNull->count() > 0) 
                    @foreach ($announcementsNull as $announcementNull)
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="50" class="col-9 col-md-3 d-flex justify-content-center my-4">
                            <div class="card text-center shadow-lg">
                                @if($announcementNull->images)
                                    @foreach ($announcementNull->images as $image)
                                        <div>    
                                            <img src="{{$image->getUrl(229,229)}}" class="card-img-top" alt="immagine">
                                        </div>
                                        @break
                                    @endforeach
                                @endif 
                                @if($announcementNull->images->count() == 0)
                                    <div>
                                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="immagine">
                                    </div>
                                @endif
                                <div class="text-center">
                                    <h6 class="pt-2">
                                        @switch(Lang::locale())
                                            @case('it')
                                                <a class="" href="{{route('announcement.researchCategory', ['category' => $announcementNull->category->id])}}">{{$announcementNull->category->it}}</a>
                                                @break
                                            @case('en')
                                                <a class="" href="{{route('announcement.researchCategory', ['category' => $announcementNull->category->id])}}">{{$announcementNull->category->en}}</a>
                                                @break
                                            @case('es')
                                                <a class="" href="{{route('announcement.researchCategory', ['category' => $announcementNull->category->id])}}">{{$announcementNull->category->es}}</a>
                                                @break           
                                        @endswitch
                                        
                                    </h6>
                                    <h4 data-mdb-toggle="tooltip" data-mdb-html="true" title="{{$announcementNull->title}}" class=" truncate name">{{$announcementNull->title}}</h4>
                                    <h4 class="m-1 price">{{$announcementNull->price}}€</h4>
                                </div>
                                <div class=" m-3 d-flex justify-content-start">
                                    <small class="text-muted">{{ __('ui.il') }} {{$announcementNull->created_at->format('d/m/Y')}}</small>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            {{$announcementsNull->links()}}
                        </div>
                    </div>
                @else
                    <div class="container  mb-5">
                        <div class="row my-3 shadow-lg p-5 radius-10">
                            <div class="col-12 col-md-6 w-100">
                                <h2 class="text-center">{{ __('ui.noAnnunci') }}</h2>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-red"><i class="fad fa-minus-hexagon"></i> {{ __('ui.rifiutatiAnnunci') }}</div>
                @if($announcementsFalse->count() > 0)
                    @foreach ($announcementsFalse as $announcementFalse)
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="50" class="col-9 col-md-3 d-flex justify-content-center my-4">
                            <div class="card text-center shadow-lg">
                                @if($announcementFalse->images)
                                    @foreach ($announcementFalse->images as $image)
                                        <div>    
                                            <img src="{{$image->getUrl(229,229)}}" class="card-img-top" alt="immagine">
                                        </div>
                                        @break
                                    @endforeach
                                @endif 
                                    @if($announcementFalse->images->count() == 0)
                                        <div>
                                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="immagine">
                                        </div>
                                @endif

                                <div class="text-center">
                                    <h6 class="pt-2">
                                        <a class="" href="{{route('announcement.researchCategory', ['category' => $announcementFalse->category->id])}}">{{$announcementFalse->category->category}}</a>
                                    </h6>
                                    <h4 data-mdb-toggle="tooltip" data-mdb-html="true" title="{{$announcementFalse->title}}" class=" truncate name">{{$announcementFalse->title}}</h4>
                                    <h4 class="m-1 price">{{$announcementFalse->price}}€</h4>
                                </div>
                                <div class=" m-3 d-flex justify-content-between">
                                    <small class="text-muted">{{ __('ui.creato') }} {{$announcementFalse->user->name}}</small>
                                    <small class="text-muted">{{ __('ui.il') }} {{$announcementFalse->created_at->format('d/m/Y')}}</small>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            {{$announcementsFalse->links()}}
                        </div>
                    </div>
                @else
                    <div class="container  mb-5">
                        <div class="row my-3 shadow-lg p-5 radius-10">
                            <div class="col-12 col-md-6 w-100">
                                <h2 class="text-center">{{ __('ui.noRifiutati') }}</h2>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <hr>
            <div class="row">
            <div class="col-12 color_verif"><i class="fad fa-badge-check"></i> {{ __('ui.accettatiAnnunci') }}</div>
            @if($announcementsTrue->count() > 0)
                @foreach ($announcementsTrue as $announcementTrue)
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="50" class="col-9 col-md-3 d-flex justify-content-center my-4">
                        <div class="card text-center shadow-lg">
                            @if($announcementTrue->images)
                                @foreach ($announcementTrue->images as $image)
                                    <div>    
                                        <img src="{{$image->getUrl(229,229)}}" class="card-img-top" alt="immagine">
                                    </div>
                                    @break
                                @endforeach
                            @endif 
                            @if($announcementTrue->images->count() == 0)
                                <div>
                                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="immagine">
                                </div>
                            @endif

                            <div class="text-center">
                                <h6 class="pt-2">
                                    <a class="" href="{{route('announcement.researchCategory', ['category' => $announcementTrue->category->id])}}">{{$announcementTrue->category->category}}</a>
                                </h6>
                                <h4 data-mdb-toggle="tooltip" data-mdb-html="true" title="{{$announcementTrue->title}}" class=" truncate name">{{$announcementTrue->title}}</h4>
                                <h4 class="m-1 price">{{$announcementTrue->price}}€</h4>
                            </div>
                            <div class=" m-3 d-flex justify-content-between">
                                <small class="text-muted">{{ __('ui.creato') }} {{$announcementTrue->user->name}}</small>
                                <small class="text-muted">{{ __('ui.il') }} {{$announcementTrue->created_at->format('d/m/Y')}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row justify-content-center mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{$announcementsTrue->links()}}
                    </div>
                </div>
            @else
                <div class="container  mb-5">
                    <div class="row my-3 shadow-lg p-5 radius-10">
                        <div class="col-12 col-md-6 w-100">
                            <h2 class="text-center">{{ __('ui.noAccettati') }}</h2>
                        </div>
                    </div>
                </div>
            @endif 
            </div>
            </div>
        </div>
    </div>




</x-layout>