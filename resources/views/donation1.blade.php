@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-warning text-dark">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Contribute</h5>
                          <p><b>100</b></p>
                          
                          <a href="{{route('pay-stripe',['amount'=>1000,'callback'=>encrypt("payment-success")])}}" class="btn btn-primary">Donate</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
