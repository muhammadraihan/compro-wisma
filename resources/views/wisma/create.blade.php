@extends('layouts.page')

@section('title', 'Wisma Create')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/dropzone/dropzone.css')}}">
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
                    {!! Form::open(['route' => 'wisma.store','id'=>'forms','method' => 'POST','class' =>
                    'needs-validation','dropzone', 'forms','novalidate','enctype' => 'multipart/form-data']) !!}
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
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('photo','Photo',['class' => 'required form-label'])}}
                        {{ Form::file('photo',null,['placeholder' => 'Photo','class' => 'form-control upload '.($errors->has('photo') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'name' => 'photo'])}}
                        @if ($errors->has('photo'))
                        <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                        @endif
                    </div>
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
    Dropzone.autoDiscover = false;
    Dropzone.autoProcessQueue = false;

    $(document).ready(function(){

        var myDropzone = new Dropzone("#dropzones", { 

        paramName: "photo",
        url: "{{route('wisma.store')}}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                addRemoveLinks: true,
                maxFiles: 5,
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads:10,
            });

        $('#button').click(function (e){
            e.preventDefault();
            myDropzone.processQueue();
        });

        myDropzone.on("sendingmultiple", function(file,xhr,formData) {
            var data = $('#forms').serializeArray();
            console.log(data);
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
        });

        myDropzone.on("successmultiple", function(files, response) {
        window.location.href = "{{route('wisma.index')}}";

        });
    });
</script>
@endsection