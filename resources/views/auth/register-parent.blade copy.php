@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="">
                <h2 class=""><b>Register</b></h2>
                
                <h2 class=""><b>Now</b></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
            @endforeach
          @endif
                @error('error')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row md-3 justify-content-center">
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div id="parent" class="card-body">
                    
                    <form id="register"  class="needs-validation" novalidate method="POST" action="{{route('register.parent')}}">
                        @csrf
                        
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                              Valid first name is required.
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" name="lastname" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                              Valid last name is required.
                            </div>
                          </div>
                        </div>
            
                        
                        <div class="mb-3">
                          <label for="email">Email </label>
                          <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="you@example.com" required>
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                          
                        </div>
            
                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                          <div class="invalid-feedback">
                            Please enter your shipping address.
                          </div>
                        </div>
            
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Country" required>
                            <div class="invalid-feedback">
                              Please select a valid country.
                            </div>
                          </div>
                          
                          <div class="col-md-6 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip" required>
                            <div class="invalid-feedback">
                              Zip code required.
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="password">Password <span class="text-muted">*</span></label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                          <div class="mb-3">
                            <label for="password_confirmation">Confirm Password <span class="text-muted">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                          </div>
                        </div>
                       
                       
                       
            
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                        
                        
                      </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script language = "javascript">
    $(document).ready(function() {
        $('#child').hide();
        $('#check_parent').click(function(){
            if ($(this).is(':checked')) {
                $('#parent').hide();
                $('#child').show();
            }else {
                $('#child').hide();
                $('#parent').show();
            }
        })
        // $("#parent").click(function(){
        //    $('#login').removeAttr('hidden');
        //    $('#register').attr('hidden',true);
        //    $('#login_btn').attr('hidden',true);
        // });
    });
</script>
@endpush
