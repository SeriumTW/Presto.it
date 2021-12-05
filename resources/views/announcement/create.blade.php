<x-layout>

    <section class="container-fluid bg_main">
        <div class="row justify-content-center align-items-center pt_100">

            <div class="col-12 col-md-7 form-signin m-5 p-5 bg_acc radius-10">

                <h1 class="text-center display-4 mb-5 color_sec">{{ __('ui.inserisci') }}</h1>

                    
                <form method="POST" action='{{route('announcement.store')}}'>
                
                @csrf 

                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

                    <div class="mb-3 form-floating">
                        <input type="text" name='title' class="form-control @error('title') is-invalid @enderror" id="exampleInputTitle" value="{{old('title')}}" placeholder="ema">
                        <label for="exampleInputTitle" class="form-label">{{ __('ui.titolo') }}</label>
                        
                        @error('title')
                            <div class="alert p-1 text-red">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="float" name='price' class="form-control @error('price') is-invalid @enderror" id="exampleInputTitle" value="{{old('price')}}" placeholder="ema">
                        <label for="exampleInputPrice" class="form-label">{{ __('ui.prezzo') }}</label>
                        
                        @error('price')
                            <div class="alert p-1 text-red">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select name="category" class="form-select" id="category">
                            @switch(Lang::locale())
                                @case('it')
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->it}}</option>
                                    @endforeach
                                        @break
                                @case('en')
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->en}}</option>
                                    @endforeach
                                    @break
                                @case('es')
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->es}}</option> 
                                    @endforeach
                                    @break           
                            @endswitch
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="exampleInputDescription" @error('description') is-invalid @enderror cols="30" rows="5" placeholder="{{ __('ui.descrizione') }}">{{old('description')}}</textarea>
                    
                        @error('description')
                            <div class="alert p-1 text-red">{{$message}}</div>
                        @enderror
                    
                    </div>

                    <div class="mb-3 form-group row">
                       
                        <div class="col-12">
                            <div class="dropzone dropzone-custom @error('images') is-invalid @enderror" name="images" id="drophere">
                                <div class="dz-message" data-dz-message><span>{{ __('ui.immagini')}}</span></div>
                            </div>

                            @error('images')
                                <div class="alert p-1 text-red">{{$message}}</div>
                            @enderror

                        </div>
                    
                    </div>
                    
                    <button type="submit" class="btn btn-primary bg_main">{{ __('ui.inser') }}</button>
                  
                </form>
            </div>
        </div>

    </section>









</x-layout>