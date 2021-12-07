@extends('layouts.page')

@section('title', 'Room Type Create')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/dropzone/dropzone.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Add New <span class="fw-300"><i>Room </i></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('room.index')}}"><i class="fal fa-arrow-alt-left">
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
                    {!! Form::open(['route' => 'room.store','method' => 'POST','class' =>
                    'needs-validation','novalidate']) !!}
                    <div class="form-group col-md-3 mb-3">
                            {{ Form::label('id_wisma','Wisma',['class' => 'required form-label'])}}
                            {!! Form::select('id_wisma', $wisma, '', ['id' =>
                            'wisma','class' =>
                            'form-control'.($errors->has('wisma') ? 'is-invalid':''), 'required'
                            => '', 'placeholder' => 'Pilih Wisma']) !!} @if ($errors->has('wisma'))
                            <div class="help-block text-danger">{{ $errors->first('wisma') }}</div>
                            @endif
                        </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('room_type','Room Type',['class' => 'required form-label'])}}
                        {{ Form::text('room_type',null,['placeholder' => 'Room Type','class' => 'form-control '.($errors->has('room_type') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('room_type'))
                        <div class="invalid-feedback">{{ $errors->first('room_type') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('name','Room Name',['class' => 'required form-label'])}}
                        {{ Form::text('name',null,['placeholder' => 'Room Name','class' => 'form-control '.($errors->has('name') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('price','Price',['class' => 'required form-label'])}}
                        <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                </div>
                        {{ Form::text('price',null,['placeholder' => '','class' => 'form-control '.($errors->has('price') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'data-inputmask' => "'alias': 'currency','prefix': ''"])}}
                        @if ($errors->has('price'))
                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('facility','Facility',['class' => 'required form-label'])}}
                        {{ Form::text('facility',null,['placeholder' => 'Facility','class' => 'form-control '.($errors->has('facility') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('facility'))
                        <div class="invalid-feedback">{{ $errors->first('facility') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
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
    $(document).ready(function(){
        $('#category').select2();
        
        // Generate a password string
        function randString(){
            var chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNP123456789";
            var string_length = 8;
            var randomstring = '';
            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            return randomstring;
        }
        
        // Create a new password
        $(".getNewPass").click(function(){
            var field = $('#password').closest('div').find('input[name="password"]');
            field.val(randString(field));
        });

        var myDropzone = new Dropzone("#dropzones", { 

        paramName: "photo",
        url: "{{route('room.store')}}",
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
        window.location.href = "{{route('room.index')}}";

        });
    });
</script>
@endsection