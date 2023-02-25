@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders navbar-light rounded-top" style="background-color: #fa8f3d;">
                <a class="nav-link {{(Request::is('home')) ? 'active' : ''}}" href="{{route('user.home')}}">Profile</a>
                <a class="nav-link {{(Request::is('home/transaction')) ? 'active' : ''}}" href="{{route('bill.home')}}" >Transaction</a>
                <a class="nav-link {{(Request::is('home/security')) ? 'active' : ''}}" href="{{route('security.home')}}" >Security</a>
            </nav>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <form action="{{route('user.image')}}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                                <!-- Profile picture image-->
                            <img id="image" class="img-account-profile rounded-circle mb-2" src="{{url('storage/'.$user->image)}}" style="width: 200px; height: 200px;" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <input type="file" id="my_file" name="profile_image" onchange="loadFile(event,'image')" style="display: none;" />
                            
                        
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Profile Details</div>
                        <div class="card-body">
                            {{-- <form action="{{route('user.profile')}}" method="POST" role="form" > --}}
                                <!-- Form Group (username)-->
                                {{-- <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">
                                </div> --}}
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">First name</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter your first name" value="{{$user->name}}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="lastname">Last name</label>
                                        <input class="form-control" id="lastname" type="text" name="lastname" placeholder="Enter your last name" value="{{$user->lastname}}">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    {{-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Organization name</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                                    </div> --}}
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="address">Address </label>
                                        <textarea rows="3" class="form-control" id="address" name="address" placeholder="" >{{$user->address}}</textarea>
                                    </div>
                                    <!-- Form Group (location)-->
                                    {{-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Location</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                                    </div> --}}
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email address</label>
                                    <input class="form-control" id="email" type="email" name="email" disabled placeholder="Enter your email address" value="{{$user->email}}">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    {{-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                                    </div> --}}
                                    <!-- Form Group (birthday)-->
                                    {{-- <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Birthday</label>
                                        <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                    </div> --}}
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link fs-4 active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">General</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Logo</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Social</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Payment</button>
              </div>
        </div>
         --}}
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   

                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 15; $i++)
                            <tr>
                                <td></td>
                                <td>Tiger</td>
                                <td>Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                
                            </tr>
                            @endfor
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
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
