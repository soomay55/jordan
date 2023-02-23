@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @auth
        <div class="w-full p-3 mb-2 text-center @if($days==0) bg-danger @else bg-warning @endif">
            @if ($days==0)
            <h4>Your Membership Expired</h4>
            @else
            <h4>Your Membership Expires in {{$days}} Days </h4>
            @endif
           
        </div>         
         @endauth
        
    </div>
    <div class="row justify-content-center">
        <div class="pricing-table">
            @foreach ($membership as $item)
            <div class="ptable-item">
                <div class="ptable-single">
                  <div class="ptable-header">
                    <div class="ptable-title">
                      <h2>{{$item->title}}</h2>
                    </div>
                    <div class="ptable-price">
                      <h2><small>$</small>{{$item->amount}}<span>/ M</span></h2>
                    </div>
                  </div>
                  <div class="ptable-body">
                    <div class="ptable-description">
                      <ul>
                        <li>Pure HTML & CSS</li>
                        <li>Responsive Design</li>
                        <li>Well-commented Code</li>
                        <li>Easy to Use</li>
                      </ul>
                    </div>
                  </div>
                  <div class="ptable-footer">
                    <div class="ptable-action">
                        <form action="{{route('checkout.amount')}}" method="post">
                            @csrf
                        <input type="text" name="membership" hidden value="1">
                        <input type="submit" value="BUY NOW" class="btn "/>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
          
            <div class="ptable-item featured-item">
              <div class="ptable-single">
                <div class="ptable-header">
                  <div class="ptable-status">
                    <span>Hot</span>
                  </div>
                  <div class="ptable-title">
                    <h2>Gold</h2>
                  </div>
                  <div class="ptable-price">
                    <h2><small>$</small>199<span>/ M</span></h2>
                  </div>
                </div>
                <div class="ptable-body">
                  <div class="ptable-description">
                    <ul>
                      <li>Pure HTML & CSS</li>
                      <li>Responsive Design</li>
                      <li>Well-commented Code</li>
                      <li>Easy to Use</li>
                    </ul>
                  </div>
                </div>
                <div class="ptable-footer">
                  <div class="ptable-action">
                    <a href="">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="ptable-item">
              <div class="ptable-single">
                <div class="ptable-header">
                  <div class="ptable-title">
                    <h2>Platinum</h2>
                  </div>
                  <div class="ptable-price">
                    <h2><small>$</small>299<span>/ M</span></h2>
                  </div>
                </div>
                <div class="ptable-body">
                  <div class="ptable-description">
                    <ul>
                      <li>Pure HTML & CSS</li>
                      <li>Responsive Design</li>
                      <li>Well-commented Code</li>
                      <li>Easy to Use</li>
                    </ul>
                  </div>
                </div>
                <div class="ptable-footer">
                  <div class="ptable-action">
                    <a href="">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="ptable-item">
                <div class="ptable-single">
                  <div class="ptable-header">
                    <div class="ptable-title">
                      <h2>Platinum</h2>
                    </div>
                    <div class="ptable-price">
                      <h2><small>$</small>299<span>/ M</span></h2>
                    </div>
                  </div>
                  <div class="ptable-body">
                    <div class="ptable-description">
                      <ul>
                        <li>Pure HTML & CSS</li>
                        <li>Responsive Design</li>
                        <li>Well-commented Code</li>
                        <li>Easy to Use</li>
                      </ul>
                    </div>
                  </div>
                  <div class="ptable-footer">
                    <div class="ptable-action">
                      <a href="">Buy Now</a>
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
