@extends('admin.layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Member card</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Member card</li>
    </ol>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
    <div class="row justify-content-between">
        <div class="col-md-8">
            <div class="tile">
                <form action="{{ route('admin.membership.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <h3 class="tile-title">Create Member card</h3>
                    <hr>
                    <div class="tile-body">
                        @foreach(config('translatable.locales') as $locale)
                       
                        <div class="form-group">
                            <label class="control-label" for="title_{{$locale}}">Title {{$locale}}</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Enter Card title"
                                id="title_{{$locale}}"
                                name="{{$locale}}[title]"
                                value="{{old($locale.'.title')}}"
                            />
                        </div> 
                        <div class="form-group">
                            <label class="control-label" for="description_{{$locale}}">Description {{$locale}}</label>
                            <textarea
                                class="form-control"
                                type="text"
                                placeholder="Enter Card Description"
                                id="description_{{$locale}}"
                                name="{{$locale}}[description]"
                                value=""
                                rows="3"
                            ></textarea>
                            
                        </div>
                        @endforeach
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                        <div class="form-group">
                            <label class="control-label" for="featured_image">Featured Image</label>
                            <input
                                class="form-control"
                                type="file"
                                
                                id="featured_image"
                                name="featured_image"
                                onchange="loadFile(event,'faviconImg')"
                            />
                        </div>
                        
                        {{-- <div class="form-group">
                            <label class="control-label" for="end_date">End Date</label>
                            <input
                                class="form-control"
                                type="date"
                                placeholder="When the Campaign Ends"
                                id="end_date"
                                name="end_date"
                                value=""
                            />
                        </div> --}}
                        <div class="form-group">
                            <label class="control-label" for="member">Total Member</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Total number of members"
                                id="member"
                                name="member"
                                value=""
                            />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="amount">Amount</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Membership Amount"
                                id="amount"
                                name="amount"
                                value="{{old('amount')}}"
                            />
                        </div>
                        
                        <div id="form-group justify-content-between">
                            <label class="control-label" for="count">Split Amount</label>
                            <div class="input-group col-md-4 m-3">
                                
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger"
                                            id="DeleteRow" type="button">
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </button>
                                        <input type="number"
                                    class="form-control m-input" name="count[]">
                                    </div>
                            </div>
                        </div>
        
                        <div id="newinput"></div>
                        <button id="rowAdder" type="button"
                            class="btn btn-dark">
                            <span class="bi bi-plus-square-dotted">
                            </span> ADD SPLIT
                        </button>
                        
                    </div>
                    <div class="tile-footer">
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  

@endsection
@push('scripts')
<script type="text/javascript">
    
    $("#rowAdder").click(function () {
        var i=1;
        newRowAdd =
        '<div id="row"> <div class="input-group col-md-4 m-3">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow" type="button">' +
        '<i class="bi bi-trash"></i> Delete</button> </div>' +
        '<input type="number" name=preloaded_amount[] class="form-control m-input"> </div> </div>';
        
        $('#newinput').append(newRowAdd);
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    });
    loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
</script>
@endpush