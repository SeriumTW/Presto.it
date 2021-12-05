<x-layout>

    

<header id="header-box" class="container-fluid">
    <div class="row vh-65 justify-content-evenly align-content-center">
        <x-message/>
        <div data-aos="zoom-out" data-aos-duration="3000" data-aos-delay="50" class=" col-12  p-0 d-flex justify-content-center align-content-center flex-column">
            
            <h1 class="color_sec display-4 text-center">{{ __('ui.benvenuto') }}</h1>
            <img class="img-fluid logo-header d-block mx-auto" src="/img/logo.it.png" alt="">

        </div>
        
    </div>

    
</header>


<div id="search-box" class="container shadow-lg">
    <div class="row">
        <div class="col-12">
            <form action="{{route('announcement.search')}}" method="get" class="">
                <div class="input-group rounded">
                    <input type="search" name="search" class="form-control rounded" placeholder="{{ __('ui.cercaAnnuncio') }}" aria-label="Search"
                    aria-describedby="search-addon" />
                    
                </div>
            </form>
        </div>
    </div>
</div>

<section class="container container-lg mb-5">
    <div class="row justify-content-center align-items-center ">
        <div class="col-12">
            <h2 class="display-4 text-center">{{ __('ui.ultimiAnnunci') }}</h2>
        </div>
        @foreach ($announcements as $announcement)
            <div class="col-10 col-md-3 d-flex justify-content-center my-3">
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
                            <img src="/img/placeLogo.jpg" class="card-img-top" alt="immagine">
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
        
    </div>
</section>

<div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="50" class="container-fluid bg-light shadow-lg my-5">
    <div class="row justify-content-center py-5">
        <div class="col-12 col-md-4  d-flex  justify-content-center align-content-center flex-column text-center zoom1">
            <i class="p-3 mb-3 fad fa-plane fa-2x color_sec"></i>
            <h4>{{ __('ui.spedizioni') }}</h4>
            <p class="mx-5">
                {{ __('ui.spedizioniDesc') }}
            </p>
        </div>
        <div class="col-12 col-md-4  d-flex  justify-content-center align-content-center flex-column text-center zoom1">
            <i class="p-3 mb-3 fad fa-tags fa-2x color_sec"></i>
            <h4>{{ __('ui.prezzi') }}</h4>
            <p class="mx-5">
                {{ __('ui.prezziDesc') }}
            </p>
        </div>
        <div class="col-12 col-md-4  d-flex  justify-content-center align-content-center flex-column text-center zoom1">
            <i class="p-3 mb-3 far fa-eye fa-2x color_sec"></i>
            <h4>{{ __('ui.vis') }}</h4>
            <p class="mx-5">
                {{ __('ui.visDesc') }}
            </p>
        </div>
    </div>
</div>



</x-layout>