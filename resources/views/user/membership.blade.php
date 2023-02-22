@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            {{-- <nav class="nav nav-borders">
                <a class="nav-link {{(Request::is('home')) ? 'active' : ''}}" href="{{route('user.home')}}">Profile</a>
                <a class="nav-link {{(Request::is('home/transaction')) ? 'active' : ''}}" href="{{route('bill.home')}}" >Transaction</a>
                <a class="nav-link {{(Request::is('home/security')) ? 'active' : ''}}" href="{{route('security.home')}}" >Security</a>
                
            </nav> --}}
            <hr class="mt-0 mb-4">
            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
            <div class="row">
                <div class="col-lg-8">
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="card border-success mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-success">Member Plan-1</div>
                                <div class="card-body text-success">
                                  <h5 class="card-title">Family Zone</h5>
                                  <p class="card-text">4 People Card</p>
                                </div>
                                <div class="card-footer bg-transparent border-success">
                                    <form action="{{route('checkout.amount')}}" method="post">
                                        @csrf
                                    <input type="text" name="membership" hidden value="1">
                                    <input type="submit" value="BUY NOW" class="btn btn-success"/>
                                    </form>
                                    
                                </div>
                              </div>
                        </div>
                        <div class="col-4">
                            <div class="card border-success mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-success">Member Plan-1</div>
                                <div class="card-body text-success">
                                  <h5 class="card-title">Family Zone</h5>
                                  <p class="card-text">4 People Card</p>
                                </div>
                                <div class="card-footer bg-transparent border-success">
                                    <a href="" class="btn btn-success">BUY NOW</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-4">
                            <div class="card border-success mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-success">Member Plan-1</div>
                                <div class="card-body text-success">
                                  <h5 class="card-title">Family Zone</h5>
                                  <p class="card-text">4 People Card</p>
                                </div>
                                <div class="card-footer bg-transparent border-success">
                                    <a href="" class="btn btn-success">BUY NOW</a>
                                </div>
                              </div>
                        </div>
                        
                            
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Refer code</div>
                        <div class="card-body">
                            <p>Enter Refference code if available</p>
                            <form>
                                
                                
                                <div class="mt-3">
                                    <label class="small mb-1" for="twoFactorSMS">Code</label>
                                    <input class="form-control" id="twoFactorSMS" type="text" placeholder="Reffer code" value="">
                                </div>
                                <div class="mt-3">
                                    
                                    <input class="form-control success" id="twoFactorSMS" type="submit" placeholder="SUBMIT">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script>
   
</script>
   
    

    {{-- https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js
https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js
https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js --}}
@endpush
