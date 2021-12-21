@extends('layouts.page')

@section('title', 'Room Type Edit')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
            <h2>Edit <span class="fw-300"><i>{{$room->name}}</i></span></h2>
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
                    {!! Form::open(['route' => ['room.update',$room->uuid],'method' => 'PUT','class' =>
                    'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('id_wisma','Wisma',['class' => 'required form-label'])}}
                        {!! Form::select('id_wisma', $wisma, $room->id_wisma, ['id' =>
                        'wisma','class' =>
                        'form-control'.($errors->has('wisma') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Wisma']) !!} @if ($errors->has('wisma'))
                        <div class="help-block text-danger">{{ $errors->first('wisma') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('room_type','Room Type',['class' => 'required form-label'])}}
                        {!! Form::select('room_type', array('kamar-hotel' => 'Kamar Hotel', 'aula' => 'Aula', 'room-meeting' => 'Room Meeting',
                            'ruko' => 'Ruko'), $room->room_type,
                        ['id'=>'room_type','class'
                        => 'custom-select'.($errors->has('room_type') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Select Room Type ...']) !!}
                        @if ($errors->has('room_type'))
                        <div class="invalid-feedback">{{ $errors->first('room_type') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('name','Room Name',['class' => 'required form-label'])}}
                        {{ Form::text('name', $room->name,['placeholder' => 'Room Name','class' => 'form-control '.($errors->has('name') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
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
                        {{ Form::text('price', $room->price,['placeholder' => '','class' => 'form-control '.($errors->has('price') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'data-inputmask' => "'alias': 'currency','prefix': ''"])}}
                        @if ($errors->has('price'))
                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('facility','Facility',['class' => 'required form-label'])}}
                        {{ Form::textarea('facility',$room->facility,['placeholder' => 'Facility','class' => 'form-control '.($errors->has('facility') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('facility'))
                        <div class="invalid-feedback">{{ $errors->first('facility') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('photo','Photo',['class' => 'required form-label'])}}
                        <input type="hidden" name="oldImage" value="{{ $room->photo }}"> 
                        @if ($room->photo)
                            <img src="{{ asset('photo/' . $room->photo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-5 col-sm-5">
                        @endif
                        {{ Form::file('photo',null,['placeholder' => 'Photo','class' => 'form-control upload '.($errors->has('photo') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'id' => 'photo'])}}
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="preview image" style="max-height: 250px;">
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
<script>
    $(document).ready(function(){
        $('.select2').select2();

        $('#photo').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });
        
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

        //Enable input and button change password
        $('#enablePassChange').click(function() {
            if ($(this).is(':checked')) {
                $('#passwordForm').attr('disabled',false); //enable input
                $('#getNewPass').attr('disabled',false); //enable button
            } else {
                    $('#passwordForm').attr('disabled', true); //disable input
                    $('#getNewPass').attr('disabled', true); //disable button
            }
        });
    });
</script>
@endsection