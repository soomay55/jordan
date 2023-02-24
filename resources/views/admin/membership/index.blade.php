@extends('admin.layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Membership Plan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Membership</li>
    </ol>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
 <div class="row justify-content-center">
    {{-- <div class="col-md-3">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link fs-4 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">General</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Logo</button>
            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Social</button>
            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Payment</button>
          </div>
    </div> --}}
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">All Membership Plan</div>
            
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

               

                <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                           
                            <th>Title</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
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
                        @foreach ($Membership as $item)
                        <tr>
                            
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->start_date}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.campaign.edit',['id'=>$item->id])}}"/>Edit</button></td>
                            
                        </tr>
                        @endforeach
                        
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-success" href="{{route('admin.membership.create')}}"><i class="bi bi-0-square"></i>Create</a>
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