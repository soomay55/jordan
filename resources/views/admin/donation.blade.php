@extends('admin.layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Donation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Donation</li>
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
    
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">All Donation</div>
            
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

               

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
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-whatever="{{$campaign->donator_email}}" data-bs-target="#exampleModal">
                                Launch demo modal
                              </button></td>
                              
                            
                        </tr>
                        @endforeach
                        
                        
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.send-mail')}}" method="post">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="email"
                    name="email"
                    value=""
                    rows="3"
                />
                
            </div>
            <div class="form-group">
                <label class="control-label" for="description">Email Content</label>
                <textarea
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="description"
                    name="description"
                    value=""
                    rows="3"
                />
                </textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
      </div>
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
var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
})
</script>
@endpush