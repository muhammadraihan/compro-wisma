@extends('frontend.app')

@section('title')
    Gallery Wisma Homestead
@endsection

@section('content')
@push('addon-style')
    <style>
        .gallery-title {
            font-size: 24px;
            text-decoration: underline;
            text-underline-position: below;
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            color: #01A89E;
            margin-bottom: 24px;
        }

        .img-container {
            width: 100%;
            max-height: 360px;
            z-index: 1;
            overflow: hidden;
        }

        .img-gallery {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 8px;
        }

        .photo-title {
            font-size: 18px;
            margin-top: 12px;
            font-family: 'Playfair Display', serif;
            color: #393939;
            font-weight: 600;
        }

        .photo-desc {
            font-size: 13px;
            margin-top: 6px;
            font-family: 'Source Sans Pro', sans-serif;
            color: grey;
            font-weight: 400;
        }
    </style>
@endpush
<div class="page-content page-home">
    <section class="homestead-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        <div class="col-12">
                            <div class="gallery-title text-center">
                                GALLERY WISMA HOMESTEAD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($gallery as $photoGallery)
                    <div class="col-6 col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('photo/' . $photoGallery->photo) }}" alt="" class="w-100 img-gallery">
                        </div>
                        <div class="photo-title">
                            {{ $photoGallery->name }}
                        </div>
                        <div class="photo-desc">
                            {{ $photoGallery->keterangan }}
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        No Photo Added
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
@endsection