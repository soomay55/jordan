@extends('layouts.app')
<script src="https://js.stripe.com/v3/"></script>
@section('content')

    <div class="wrapper container">
      <div class="py-5 text-center">
        @if(Setting::get('site_logo'))
        <img class="d-block mx-auto mb-4" src="{{asset("/storage")."/".Setting::get('site_logo')}}" alt="" width="72" height="72">
        @endif
        <h2>Donation form</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-5  order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Donation Amount</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$Campaign->title}}</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted fs-1">{{Setting::get('currency_symbol')}}{{$amount}}</span>
            </li>
           
          </ul>

          <form id="payment-form" class="hidden">
            <div id="payment-element">
              <!--Stripe.js injects the Payment Element-->
            </div>
            <button class="btn btn-primary btn-block" id="submit" disabled>
              <div class="spinner hidden" id="spinner"></div>
              <span id="button-text">Pay now</span>
            </button>
            <div id="payment-message" class="hidden"></div>
          </form>
        </div>
        <div class="col-md-6 order-md-1">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
            @endforeach
          @endif
          {{-- <h4 class="mb-3">{{Auth::check() ? "Registered Address" : "Register"}}</h4>
          <p>{{Auth::check()}}</p> --}}
          

         {{-- Register form  --}}
         @if (auth()->check())
         <h4 class="mb-3">Registered Address</h4>
         <form  class="needs-validation" novalidate method="POST" action="{{route('user.register')}}">
          @csrf
          
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" name="name" id="firstName" placeholder=""  value="{{auth()->user()->name}}" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" name="lastname" id="lastName" placeholder=""  value="{{auth()->user()->lastname}}" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          
          <div class="mb-3">
            <label for="email">Email </label>
            <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}" placeholder="you@example.com" required>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{auth()->user()->address}}" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="country">Country</label>
              <input type="text" class="form-control" name="country" id="country" value="{{auth()->user()->country}}" placeholder="Country" required>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" name="zip" value="{{auth()->user()->zip}}" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            {{-- <div class="mb-3">
              <label for="password">Password <span class="text-muted">*</span></label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
              <label for="password_confirmation">Confirm Password <span class="text-muted">*</span></label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
            </div> --}}
          </div>
          {{-- <hr class="mb-4">
         
          <hr class="mb-4">

          <button class="btn btn-primary btn-lg btn-block" type="submit">Register to checkout</button> --}}
         
        </form>
         @else

         <h4 class="mb-3">Register</h4>
          <form id="register"  class="needs-validation" novalidate method="POST" action="{{route('user.register')}}">
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
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
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
           
           
           

            <button class="btn btn-primary btn-lg btn-block" type="submit">Register to checkout</button>
            <hr class="mb-4">
            
          </form>
          <button class="btn btn-primary btn-lg btn-block"  id="login_btn">Login</button>
          @endif
          
          <form id="login" hidden class="needs-validation" novalidate method="POST" action="{{route('user.login')}}">
            @csrf
            <div>
            <div class="row">
             <div class="mb-3">
                <label for="email">Email </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="mb-3">
                  <label for="password">Password <span class="text-muted">*</span></label>
                  <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                
              <hr class="mb-4">
            
              <hr class="mb-4">
  
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login to checkout</button>
            </div>
          </form>
          
          </div>
          {{-- Login form --}}
          
        
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    @endsection
@push('script')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=""></script>
    <script language = "javascript">
      $(document).ready(function() {
          $("#login_btn").click(function(){
             $('#login').removeAttr('hidden');
             $('#register').attr('hidden',true);
             $('#login_btn').attr('hidden',true);
          });
      });
  </script>
    
    <script>
        // This is your test publishable API key.
const stripe = Stripe("pk_test_51MZROtSIP0109f7iORGCfxyUtO1SQXOlhgpUbZGvoYhlmQfNKFOqj1JZoToRO9HyfQONHGGHOfeLYQNQ5uCwtNWt00fUCL5ux2");
// The items the customer wants to buy
const items = [{ id: "xl-tshirt" }];
let elements;
checkLoginStatus();
initialize();
checkStatus();



function checkLoginStatus(){
  if({{Auth::check()}}){
    $('#payment-form').removeClass('hidden');
    $('#submit').removeAttr('disabled');
  }
}
document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

// Fetches a payment intent and captures the client secret
async function initialize() {
  const { clientSecret } = await fetch("{!! route('pay.pay-stripe',['order_amount'=>$amount,'campaign_id'=>$Campaign->id,'callback'=>'dammy']) !!}", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ items }),
  }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });
console.log(elements);

  const paymentElementOptions = {
    layout: "tabs",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: "{{route('pay-stripe.success')}}",
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageText.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

@endpush