<x-layout>


    <section class="container mt_150">
        <div class="row justify-content-center align-items-center radius-10 shadow-lg p-4 mb-5">
            <div class="col-12">
                @switch(Lang::locale())
                    @case('it')
                        <h3 class="">{{ __('ui.filtro') }} {{$category->it}}</h3>
                        @break
                    @case('en')
                        <h3 class="">{{ __('ui.filtro') }} {{$category->en}}</h3>
                        @break
                    @case('es')
                        <h3 class="">{{ __('ui.filtro') }} {{$category->es}}</h3>
                        @break           
                @endswitch
            </div>

            <hr>
            
            @if($announcements->count() > 0)
                @foreach ($announcements as $announcement)
                    
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="50" class="col-12 col-md-3 d-flex justify-content-center my-3">
                    <div class="card text-center shadow-lg">
                        @if($announcement->images)
                            @foreach ($announcement->images as $image)
                                <div>    
                                    <img src="{{$image->getUrl(306,306)}}" class="card-img-top" alt="immagine">
                                </div>
                                @break
                            @endforeach
                        @endif 
                        @if($announcement->images->count() == 0)
                            <div>
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="immagine">
                            </div>
                        @endif
                    
                        <div class="text-center">
                            <h6 class="pt-2">
                                @switch(Lang::locale())
                                    @case('it')
                                        <a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->it}}</a>
                                        @break
                                    @case('en')
                                        <a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->en}}</a>
                                        @break
                                    @case('es')
                                        <a href="{{route('announcement.researchCategory', ['category' => $announcement->category->id])}}">{{$announcement->category->es}}</a>
                                        @break           
                                @endswitch
                            </h6>
                            <h4 data-mdb-toggle="tooltip" data-mdb-html="true" title="{{$announcement->title}}" class=" truncate name">{{$announcement->title}}</h4>
                            <h4 class="m-1 price">{{$announcement->price}}€</h4>
                            <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary bg_main">{{ __('ui.scopri') }}</a>
                        </div>
                        <div class=" m-3 d-flex flex-lg-row flex-column justify-content-between">
                            <small class="text-muted">{{ __('ui.creato') }} <a href="{{route('messages.contact', ['user_id' => $announcement->user->id] )}}">{{$announcement->user->name}}</a></small>
                            <small class="text-muted">{{ __('ui.il') }} {{$announcement->created_at->format('d/m/Y')}}</small>
                        </div>
                    </div>
                </div> 
                
                @endforeach
                
                <div class="row justify-content-center mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{$announcements->links()}}
                    </div>
                </div>
            @else
            <div class="container  mb-5">
                <div class="row my-3 shadow-lg p-5 radius-10">
                    <div class="col-12 col-md-6 w-100 text-center">
                        <h2 class="text-center">{{__('ui.nonAnnunci')}}</h2>
                        <a href="{{route('announcement.create')}}" class="btn btn-primary bg_main mt-3">{{ __('ui.inserisci') }}</a>
                    </div>
                </div>
            </div>
            @endif        
 
        </div>
    </section>
    
</x-layout>