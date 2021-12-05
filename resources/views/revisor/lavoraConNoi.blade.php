<x-layout>

    <section class="container-fluid pt-5">
        <div class="row vh-100 bg_main justify-content-center align-items-center">
          
          <div class="col-12 col-md-5 form-signin m-5 p-5 bg_acc pt-200 radius-10">

              <h1 class="text-center mb-5 color_sec display-3">{{__('ui.workWithUs')}}</h1>

              <form action="{{route('revisor.store')}}" method="POST">
                  @csrf
                    <div class="mb-3 form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="user_email" value="{{old('email')}}" placeholder="emanuele">
                        <label for="user_email">Email</label>
                            @error('email') 
                                <div class="alert p-1 text-red">{{__('ui.errorEmail')}}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <select name="job" class="form-select" id="job">
                                <option selected value="1">{{__('ui.revisore')}}</option> 
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="exampleInputDescription" @error('description') is-invalid @enderror cols="30" rows="5" placeholder="{{__('ui.messageWork')}}">{{old('description')}}</textarea>
                        @error('description')
                            <div class="alert p-1 text-red">{{__('ui.errorMessage')}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between form-floating">
                      <button type="submit" class="btn btn-primary bg_main">{{__('ui.invia')}}</button>
                    </div>
                    
              </form>
          </div>
      </div>
    </section>
    
</x-layout>