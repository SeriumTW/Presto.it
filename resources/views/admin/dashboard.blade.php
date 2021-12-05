<x-layout>
    <div class="container mt_150">
        <div class="row">
            <div class="col-12">
                <h2>Dashboard <i class="fad fa-chalkboard-teacher"></i></h2>
            </div>
        </div>
    </div>
    {{-- user --}}
    <div class="container  mt-3 mb-5 p-2 radius-10">
        <div class="row ">
            <div class="col-12">
                <h3>{{ __('ui.utenti') }}</h3>
            </div>
        </div> 
    
        @if($usersRev)    
            <div class="container mb-5">
                <div class="row my-3 shadow-lg p-4 radius-10 justify-content-center align-item-center">
                    <div class="col-10 col-md-6 col-lg-3 shadow-lg p-4 radius-10 d-flex flex-column">
                        @foreach($usersRev as $user)
                            <div class="px-2 d-flex flex-column ">
                                <h5>{{$user->name}}</h5>
                                <h6>{{$user->email}}</h6>
                                <hr>
                                <h5>{{ __('ui.utenteDesc') }}</h5>
                                <p>{{$user->description}}</p>
                                <hr>
                                <p class="text-muted">{{ __('ui.inviatoIl') }} {{$user->updated_at->format('d/m/Y')}}</p>
                            </div>
                            <form action="{{route('admin.accepted', ['id'=>$user->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 mb-1">{{ __('ui.accetta') }}</button>
                            </form>
                            <form action="{{route('admin.rejected', ['id'=>$user->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">{{ __('ui.rifiuta') }}</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
        <div class="container mb-5">
            <div class="row my-3 shadow-lg p-5 radius-10">
                <div class="col-12 col-md-6 w-100">
                    <h2 class="text-center">{{ __('ui.nonUtenti') }}</h2>
                </div>
            </div>
        </div>
        
        @endif

        <hr>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h3>{{ __('ui.annunciRev') }}</h3>
                </div>
            </div>
        </div>
        

        {{-- annunci --}}
        @if ($announcement)    
            <div class="container mb-5">
                <div class="row my-3 shadow-lg p-5">
                    @if($announcement->images->count()>0)
                    <div class="col-12 col-md-6">
                    
                        <section class="">
                            <!-- Section: Images -->
                            <section class="">
                                <div class="row">
                                    @foreach ($announcement->images as $image)
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
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
                                                
                                                <h4 class="mt-3 text-center" >Sistema di Valutazione <i class="fad fa-user-robot"></i></h4>
                                                <div class="m-3 d-flex flex-wrap justify-content-evenly">
                                                
                                                    {{-- adult --}}
                                                    @if ($image->adult == 'VERY_UNLIKELY' || $image->adult == 'UNLIKELY')
                                                    <p>Adult: <i class="fad fa-badge-check color_verif"></i></p>
                                                    @elseif ($image->adult == 'POSSIBLE')
                                                        <p>Adult: <i class="fad fa-exclamation-circle color_sec"></i></p>
                                                    @elseif ($image->adult == 'VERY_LIKELY' || $image->adult == 'LIKELY')
                                                        <p>Adult: <i class="fad fa-minus-hexagon text-red"></i></p> 
                                                    @else
                                                        <p>Adult: <i class="fad fa-question-circle"></i></p> 
                                                    @endif
                                                    
                                                    {{-- spoof --}}
                                                    @if ($image->spoof == 'VERY_UNLIKELY' || $image->spoof == 'UNLIKELY')
                                                    <p>Spoof: <i class="fad fa-badge-check color_verif"></i></p>
                                                    @elseif ($image->spoof == 'POSSIBLE')
                                                        <p>Spoof: <i class="fad fa-exclamation-circle color_sec"></i></p>
                                                    @elseif ($image->spoof == 'VERY_LIKELY' || $image->spoof == 'LIKELY')
                                                        <p>Spoof: <i class="fad fa-minus-hexagon text-red"></i></p> 
                                                    @else
                                                        <p>Spoof: <i class="fad fa-question-circle"></i></p> 
                                                    @endif

                                                    {{-- medical --}}
                                                    @if ($image->medical == 'VERY_UNLIKELY' || $image->medical == 'UNLIKELY')
                                                    <p>Medical: <i class="fad fa-badge-check color_verif"></i></p>
                                                    @elseif ($image->medical == 'POSSIBLE')
                                                        <p>Medical: <i class="fad fa-exclamation-circle color_sec"></i></p>
                                                    @elseif ($image->medical == 'VERY_LIKELY' || $image->medical == 'LIKELY')
                                                        <p>Medical: <i class="fad fa-minus-hexagon text-red"></i></p> 
                                                    @else
                                                        <p>Medical: <i class="fad fa-question-circle"></i></p> 
                                                    @endif

                                                    {{-- violence --}}
                                                    @if ($image->violence == 'VERY_UNLIKELY' || $image->violence == 'UNLIKELY')
                                                    <p>Violence: <i class="fad fa-badge-check color_verif"></i></p>
                                                    @elseif ($image->violence == 'POSSIBLE')
                                                        <p>Violence: <i class="fad fa-exclamation-circle color_sec"></i></p>
                                                    @elseif ($image->violence == 'VERY_LIKELY' || $image->violence == 'LIKELY')
                                                        <p>Violence: <i class="fad fa-minus-hexagon text-red"></i></p> 
                                                    @else
                                                        <p>Violence: <i class="fad fa-question-circle"></i></p> 
                                                    @endif
                                                    
                                                    {{-- racy --}}
                                                    @if ($image->racy == 'VERY_UNLIKELY' || $image->racy == 'UNLIKELY')
                                                    <p>racy: <i class="fad fa-badge-check color_verif"></i></p>
                                                    @elseif ($image->racy == 'POSSIBLE')
                                                        <p>racy: <i class="fad fa-exclamation-circle color_sec"></i></p>
                                                    @elseif ($image->racy == 'VERY_LIKELY' || $image->racy == 'LIKELY')
                                                        <p>racy: <i class="fad fa-minus-hexagon text-red"></i></p> 
                                                    @else
                                                        <p>racy: <i class="fad fa-question-circle"></i></p> 
                                                    @endif
                                                </div>
                                                <h4 class="mt-3 text-center">Etichette <i class="fad fa-tags"></i></h4>
                                                <div class="m-2">
                                                    <ul class="d-flex flex-wrap p-0 justify-content-evenly">
                                                        @if ($image->labels)
                                                            @foreach ($image->labels as $label)
                                                                <li>{{$label}}</li>                                                            
                                                            @endforeach
                                                        @endif
                                                    </ul>
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
                    <div class="col-md-6 col-12 mb-4 d-flex align-items-center justify-content-center">
                        <section class="">
                            <!-- Section: Images -->
                            <section class="">
                                <div class="row">    
                                    @for ($i = 0; $i < 3; $i++)
                                        <div class="col-lg-4 col-md-12 mb-4">
                                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                                <img src="/img/placeLogo.jpg" class="w-100"/>
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
                        <div  class="px-2 d-flex flex-column ">
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
                            <h5>{{ __('ui.prezzo') }} {{$announcement->price}}€</h5>
                        </div>
                        <hr>
                        <div class="px-2">
                            <h5>{{ __('ui.descArticolo') }}</h5>
                            <p>{{$announcement->description}}</p>
                        </div>
                        <hr>
                        <div class="px-2 d-flex flex-column justify-content-between">
                            <p class="text-muted">{{ __('ui.creato') }} <a href="{{route('messages.contact', ['user_id' => $announcement->user->id] )}}">{{$announcement->user->name}}</a></p>
                            <p class="text-muted">{{ __('ui.il') }} {{$announcement->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <form action="{{route('admin.accepted.announcement', ['id'=>$announcement->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success me-5 ">{{ __('ui.accetta') }}</button>
                        </form>
                        <form action="{{route('admin.rejected.announcement', ['id'=>$announcement->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger ">{{ __('ui.rifiuta') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        @else
            <div class="container mb-5">
                <div class="row my-3 shadow-lg p-5 radius-10">
                    <div class="col-12 col-md-6 w-100">
                        <h2 class="text-center">{{ __('ui.nonAnnunciRev') }}</h2>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>