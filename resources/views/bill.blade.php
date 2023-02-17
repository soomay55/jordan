@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link {{(Request::is('home')) ? 'active' : ''}}" href="{{route('user.home')}}">Profile</a>
                <a class="nav-link {{(Request::is('home/transaction')) ? 'active' : ''}}" href="{{route('bill.home')}}" >Transaction</a>
                <a class="nav-link {{(Request::is('home/security')) ? 'active' : ''}}" href="{{route('security.home')}}" >Security</a>
                
            </nav>
            <hr class="mt-0 mb-4">
            {{-- <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted">Current monthly bill</div>
                            <div class="h3">$20.00</div>
                            <a class="text-arrow-icon small" href="#!">
                                Switch to yearly billing
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary">
                        <div class="card-body">
                            <div class="small text-muted">Next payment due</div>
                            <div class="h3">July 15</div>
                            <a class="text-arrow-icon small text-secondary" href="#!">
                                View payment history
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Current plan</div>
                            <div class="h3 d-flex align-items-center">Freelancer</div>
                            <a class="text-arrow-icon small text-success" href="#!">
                                Upgrade plan
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Payment methods card-->
            {{-- <div class="card card-header-actions mb-4">
                <div class="card-header">
                    Payment Methods
                    <button class="btn btn-sm btn-primary" type="button">Add Payment Method</button>
                </div>
                <div class="card-body px-0">
                    <!-- Payment method 1-->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                             <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                            <div class="ms-4">
                                <div class="small">Visa ending in 1234</div>
                                <div class="text-xs text-muted">Expires 04/2024</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <div class="badge bg-light text-dark me-3">Default</div>
                            <a href="#!">Edit</a>
                        </div>
                    </div>
                    <hr>
                    <!-- Payment method 2-->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                            <div class="ms-4">
                                <div class="small">Mastercard ending in 5678</div>
                                <div class="text-xs text-muted">Expires 05/2022</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <a class="text-muted me-3" href="#!">Make Default</a>
                            <a href="#!">Edit</a>
                        </div>
                    </div>
                    <hr>
                    <!-- Payment method 3-->
                    <div class="d-flex align-items-center justify-content-between px-4">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                            <div class="ms-4">
                                <div class="small">American Express ending in 9012</div>
                                <div class="text-xs text-muted">Expires 01/2026</div>
                            </div>
                        </div>
                        <div class="ms-4 small">
                            <a class="text-muted me-3" href="#!">Make Default</a>
                            <a href="#!">Edit</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Billing history card-->
            <div class="card mb-4">
                <div class="card-header">Donation History</div>
                <div class="card-body p-0">
                    <!-- Billing history table-->
                    <div class="table-responsive table-billing-history">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="border-gray-200" scope="col">Transaction ID</th>
                                    <th class="border-gray-200" scope="col">Date</th>
                                    <th class="border-gray-200" scope="col">Amount</th>
                                    <th class="border-gray-200" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($donation->donation as $item)
                                <tr>
                                    <td>{{$item->txn_id}}</td>
                                    <td>{{$item->donate_date}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td><span class="badge {{$item->status=="paid"? "bg-success" :"bg-light"}} text-dark">{{$item->status}}</span></td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script>
   $(document).ready(function(){
    $("#image").click(function() {
    $("input[id='my_file']").click();
});
loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
   });
    $(document).ready(function() {
    $('#example').DataTable({
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
    });
} );
</script>
   
    

    {{-- https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js
https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js
https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js --}}
@endpush
