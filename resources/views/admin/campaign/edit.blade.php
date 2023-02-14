@extends('admin.layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Campaign</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Campaign/Edit</li>
    </ol>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
    <div class="row justify-content-between">
        <div class="col-md-8">
            <div class="tile">
                <form action="{{ route('admin.campaign.update',["id"=>$Campaign->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <h3 class="tile-title">Edit Campaign</h3>
                    <hr>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Enter site name"
                                id="title"
                                name="title"
                                value={{$Campaign->title}}
                            />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea
                                class="form-control"
                                type="text"
                                placeholder=""
                                id="description"
                                name="description"
                                value=
                                rows="3"
                            >
                            {{$Campaign->description}}
                            </textarea>
                        </div>
                        <img src={{asset("/storage/".$Campaign->featured_image)}} id="faviconImg" style="width: 80px; height: auto;">
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
                        <div class="form-group">
                            <label class="control-label" for="video_link">Video link</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="eg. YouTube video link"
                                id="video_link"
                                name="video_link"
                                value={{$Campaign->video_link}}
                            />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="end_date">End Date</label>
                            <input
                                class="form-control"
                                type="date"
                                placeholder="When the Campaign Ends"
                                id="end_date"
                                name="end_date"
                                value={{$Campaign->end_date}}
                            />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="goal">Goal Amount</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="When the Campaign Ends"
                                id="goal"
                                name="goal"
                                value={{$Campaign->goal}}
                            />
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label" for="preloaded_amount">Preloaded Amount</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="When the Campaign Ends"
                                id="preloaded_amount"
                                name="preloaded_amount"
                                value=""
                            />
                        </div> --}}
                        <div id="form-group justify-content-between">
                            <label class="control-label" for="preloaded_amount">Preloaded Amount</label>
                            {{-- {{dd($Campaign->preloaded_amount)}} --}}
                            @if ($Campaign->preloaded_amount !=null)
                            @foreach ($Campaign->preloaded_amount as $item)
                            <div id="row">
                                <div class="input-group col-md-4 m-3">
                                    
                                        <div class="input-group-prepend">
                                            <button class="btn btn-danger"
                                                id="DeleteRow" type="button">
                                                <i class="bi bi-trash"></i>
                                                Delete
                                            </button>
                                            <input type="number"
                                        class="form-control m-input" value={{$item}} name="preloaded_amount[]">
                                        </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            
                            
                        
                        </div>
        
                        <div id="newinput"></div>
                        <button id="rowAdder" type="button"
                            class="btn btn-dark">
                            <span class="bi bi-plus-square-dotted">
                            </span> ADD AMOUNT
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