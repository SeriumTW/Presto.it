<x-layout>

    <section class="container-fluid ">
        <div class="row vh-100  bg_main justify-content-center align-items-center ">
          
          <div class="col-12 col-md-7 form-signin m-5 p-5 bg_acc pt-150 radius-10">

              <h1 class="text-center mb-5 color_sec display-3">{{ __('ui.registrati') }}</h1>

              <form action="{{route('register')}}" method="POST">
                  @csrf
                    <div class="mb-3 form-floating ">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="user_name" value="{{old('name')}}" placeholder="emanuele">
                      <label for="user_name">{{ __('ui.nome') }}</label>
                      @error('name') 
                          <div class="alert p-1 text-red">{{ __('ui.errorNome') }}</div>
                      @enderror
                    </div>
                    <div class="mb-3 form-floating">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="user_email" value="{{old('email')}}" placeholder="emanuele">
                      <label for="user_email"> Email</label>
                      @error('email') 
                          <div class="alert p-1 text-red">{{ __('ui.errorEmail') }}</div>
                      @enderror
                    </div>
                    <div class="mb-3 form-floating">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user_password" placeholder="emanuele">
                      <label for="user_password">Password</label>
                      @error('password') 
                          <div class="alert p-1 text-red">{{ __('ui.errorPassword') }}</div>
                      @enderror
                    </div>
                    <div class="mb-3 form-floating">
                      <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="user_password_confirmation" placeholder="emanuele">
                      <label for="user_password_confirmation">{{ __('ui.errorPasswordConf') }}</label>
                      @error('password') 
                          <div class="alert p-1 text-red">{{ __('ui.errorPassword2') }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary bg_main mb-3">{{ __('ui.registrati') }}</button>
                      <div><a href="{{route('login')}}">{{ __('ui.giàRegistrato') }}</a></div>
                    </div>
                    
              </form>
          </div>
      </div>
    </section>
    
</x-layout>