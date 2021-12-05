<x-layout>

    <section class="container-fluid bg_main">
        <div class="row vh-100 justify-content-center align-items-center">

            <div class="col-12 col-md-7 form-signin m-5 p-5 bg_acc radius-10">

                <h1 class="text-center display-2 mb-5 color_sec">{{ __('ui.login') }}</h1>

                <form action="{{route('login')}}" method="POST">
                    @csrf
                      <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('name') is-invalid @enderror" id="floatingEmail" value="{{old('email')}}" placeholder="name@example.com">
                        <label for="floatingEmail">Email</label>
                        @error('email') 
                            <div class="alert p-1 text-red">{{ __('ui.errorEmail') }}</div>
                        @enderror
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control @error('name') is-invalid @enderror" id="user_password" placeholder="password">
                        <label for="user_password">Password</label>
                        @error('password') 
                            <div class="alert p-1 text-red">{{ __('ui.errorPassword') }}</div>
                        @enderror
                      </div>
                      <div class="mb-3 ">
                        <button type="submit" class="btn btn-primary bg_main mb-3">{{ __('ui.login') }}</button>
                        <div><a href="{{route('register')}}">{{ __('ui.nonRegistrato') }}</a></div>
                      </div>
                </form>
            </div>
        </div>

    </section>

    
    
</x-layout>