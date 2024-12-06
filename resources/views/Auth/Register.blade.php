@extends('Layouts.App')


@section('Content')
<br>
<br>
<br>
    
<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
            <div class="mb-4">

               <form method="post" action="" id="RegisterForm" class="contact-form">	

                @csrf
                
                  <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Name">Full Name</label>
                            <input type="text" name="name" placeholder="" id="Name" autofocus="">
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" placeholder="" id="Email" class="" autocorrect="off" autocapitalize="off" autofocus="">
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" value="" name="password" placeholder="" id="Password" class="">                        	
                        </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" class="btn mb-3" value="Create">
                    </div>
                 </div>

             </form>

            </div>
           </div>
    </div>
</div>


@endsection