@extends('layouts.page')

@section('title', 'Wisma Create')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Add New <span class="fw-300"><i>Wisma </i></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('wisma.index')}}"><i class="fal fa-arrow-alt-left">
                        </i>
                        <span class="nav-link-text">Back</span>
                    </a>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                        data-offset="0,10" data-original-title="Fullscreen"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Form with <code>*</code> can not be empty.
                    </div>
                    {!! Form::open(['route' => 'wisma.store','method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'image-upload', 'class' =>
                    'dropzone','novalidate']) !!}
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('name','Wisma Name',['class' => 'required form-label'])}}
                        {{ Form::text('name',null,['placeholder' => 'Wisma Name','class' => 'form-control '.($errors->has('name') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('address','Address',['class' => 'required form-label'])}}
                        {{ Form::textarea('address',null,['placeholder' => 'Address','class' => 'form-control '.($errors->has('address') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'rows' => '5'])}}
                        @if ($errors->has('address'))
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('telephone','Telephone',['class' => 'required form-label'])}}
                        {{ Form::text('telephone',null,['placeholder' => 'Telephone','class' => 'form-control '.($errors->has('telephone') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('telephone'))
                        <div class="invalid-feedback">{{ $errors->first('telephone') }}</div>
                        @endif
                    </div>
                    <!-- <div class="form-group">
                        <div class="panel-hdr">
                            <h2>Upload <span class="fw-300"><i>Photo</i></span></h2>
                        </div>
                        <div id="dropzones" class="dropzone">
                            <div class="needsclick dz-message">
                                <i class="fal fa-cloud-upload text-muted mb-3"></i> <br>
                                <span class="text-uppercase">Tarik file foto kesini atau klik untuk upload.</span>
                                <br>
                                <span class="fs-sm text-muted">Anda dapat mengupload<strong> max. 5</strong> file
                                    sekaligus</span>
                                <br>
                                <span class="fs-sm text-muted">file tidak boleh lebih dari<strong> 10mb</strong></span>
                                <br>
                                <span class="fs-sm text-muted">file yang diizinkan adalah<strong> jpg, jpeg,
                                        png</strong></span>
                            </div>
                        </div>
                    </div> -->
                <div
                    class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button class="btn btn-primary ml-auto" type="submit">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/formplugins/select2/select2.bundle.js')}}"></script>
<script src="{{asset('js/formplugins/dropzone/dropzone.js')}}"></script>
<script>
    $(document).ready(function(){

        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    });
</script>
@endsection