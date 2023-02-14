@extends('admin.layouts.main')

{{-- @section('title') {{ $pageTitle }} @endsection --}}

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $pageTitle }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
    </ol>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-3">
            {{-- <div class="tile p-0"> --}}
                {{-- <div class="d-flex w-full align-items-start"> --}}
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-airplane-engines"></i>General</button>
                      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Logo</button>
                      <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Social</button>
                      <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Payment</button>
                    </div>
                    
                  {{-- </div> --}}
                {{-- <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">Footer &amp; SEO</a></li>
                    <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                    <li class="nav-item"><a class="nav-link" href="#analytics" data-toggle="tab">Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
                </ul> --}}
            {{-- </div> --}}
        </div>
        <div class="col-md-5">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  @include('admin.settings.includes.general')
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    @include('admin.settings.includes.logo')
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"> 
                    @include('admin.settings.includes.social_links')
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    @include('admin.settings.includes.payments')
                </div>
              </div>
            <div class="tab-content " id="myTabContent">
                {{-- <div class="tile">
                    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">General Settings</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="site_name">Site Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter site name"
                                    id="site_name"
                                    name="site_name"
                                    value="{{ config('settings.site_name') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="site_title">Site Title</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter site title"
                                    id="site_title"
                                    name="site_title"
                                    value="{{ config('settings.site_title') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="default_email_address">Default Email Address</label>
                                <input
                                    class="form-control"
                                    type="email"
                                    placeholder="Enter store default email address"
                                    id="default_email_address"
                                    name="default_email_address"
                                    value="{{ config('settings.default_email_address') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="currency_code">Currency Code</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter store currency code"
                                    id="currency_code"
                                    name="currency_code"
                                    value="{{ config('settings.currency_code') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="currency_symbol">Currency Symbol</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter store currency symbol"
                                    id="currency_symbol"
                                    name="currency_symbol"
                                    value="{{ config('settings.currency_symbol') }}"
                                />
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    @if (config('settings.site_logo') != null)
                                        <img src="{{ asset('storage/'.config('settings.site_logo')) }}" id="logoImg" style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label class="control-label">Site Logo</label>
                                        <input class="form-control" type="file" name="site_logo" onchange="loadFile(event,'logoImg')"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    @if (config('settings.site_favicon') != null)
                                        <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <label class="control-label">Site Favicon</label>
                                        <input class="form-control" type="file" name="site_favicon" onchange="loadFile(event,'faviconImg')"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <div role="tabpanel" class="tab-pane " id="general">
                    @include('admin.settings.includes.general')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="site-logo">
                    @include('admin.settings.includes.logo')
                </div>
                <div class="tab-pane fade" id="footer-seo">
                    @include('admin.settings.includes.footer_seo')
                </div>
                <div class="tab-pane fade" id="social-links">
                    @include('admin.settings.includes.social_links')
                </div>
                {{-- <div class="tab-pane fade" id="analytics">
                    @include('admin.settings.includes.analytics')
                </div> --}}
                <div class="tab-pane fade" id="payments">
                    @include('admin.settings.includes.payments')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush