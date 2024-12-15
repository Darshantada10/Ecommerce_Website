@extends('Layouts.App')


@section('Content')
<br>
<br>
<br>
    {{-- {{dd(Auth::user()->name)}} --}}
<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Login</h1></div>
      </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
            <div class="mb-4">

               <form method="post" action="" id="LoginForm" class="contact-form">	

                @csrf

                @if (session('error'))
                    <p style="color: red;">{{session('error')}}</p>
                @endif
                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="" id="email" class="" autocorrect="off" autocapitalize="off" autofocus="" value="{{old('email')}}">

                            @error('email')
                                <p style="color: red;">{{$message}}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" value="" name="password" placeholder="" id="password" class="" value="{{old('password')}}">   
                            @error('password')
                                <p style="color: red;">{{$message}}</p>
                            @enderror                     	
                        </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" class="btn mb-3" value="Sign In">
                        <p class="mb-4">
                            <a href="#" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
                            <a href="register.html" id="customer_register_link">Create account</a>
                        </p>
                    </div>

                 </div>

             </form>

            </div>
           </div>
    </div>
</div>

@endsection