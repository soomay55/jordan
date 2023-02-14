@extends('admin.layouts.main')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Donation</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="large text-white stretched-link" href="#">{{Setting::get('currency_code')." ".$total}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Last 24 hours</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="large bold text-white stretched-link" href="#">{{$total_24_hours}}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div> --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Campaign</th>
                        <th>Amount</th>
                        <th>transaction</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Option</th>
                        {{-- <th>Start date</th>
                        <th>Salary</th>
                        <th>Extn.</th>
                        <th>E-mail</th>
                        <th>num</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($Campaign)}} --}}
                  @foreach($Campaign as $campaign)
                    <tr>
                        
                        <td>{{$campaign->donator_name}}</td>
                        <td>{{$campaign->campaign['title']}}</td>
                        <td>{{$campaign->amount}}</td>
                        <td>{{$campaign->txn_id}}</td>
                        <td>{{\Carbon\Carbon::parse($campaign->donate_date)->diffForHumans()}}</td>
                        <td>{{$campaign->status}}</td>
                        <td><a href="">i<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg></a></td>
                          
                        
                    </tr>
                    @endforeach
                    
                    
                   
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable({
        
    });
} );
</script>
@endpush