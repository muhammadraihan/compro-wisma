@extends('frontend.app')

@section('title')
    Sarana Penginapan Yang Nyaman Dan Aman
@endsection

@section('content')
<div class="page-content page-home">
    <section class="homestead-hero">
        <div class="row">
            <div class="col-lg-12">
                <img src="images/hero-homestead.png" alt="Hero Image" class="w-100 img-hero" data-aos="fade-left"
                    data-aos-delay="200">
                <div class="hero-description" data-aos="fade-right" data-aos-delay="200">
                    <div class="hero-title">
                        WISMA HOMESTEAD
                    </div>
                    <div class="hero-big-title">
                        penginapan murah dan <span>nyaman</span><br /> untuk kebutuhan ANDA.
                    </div>
                    <div class="hero-subtitle">
                        sarana penginapan yang berkualitas dengan harga terjangkau.
                    </div>
                    <div class="btn-cta">
                        <a href="{{ route('about') }}" class="btn btn-homestead-primary px-4">
                            Tentang Homestead
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homestead-video-section" data-aos="fade-up" data-aos-delay="250">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6">
                    <div class="video-section mb-2">
                        <img src="images/video.png" alt="Video" class="w-100">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="vide-title-container">
                        <div class="little-title">
                            TEMPAT ISTIRAHAT YANG NYAMAN
                        </div>
                        <div class="big-title">
                            ANDA DAPAT BERISTIRAHAT NYAMAN DI PENGINAPAN yang berkualitas dengan harga terjangkau.
                        </div>
                        <div class="btn-cta">
                            <a href="{{ route('tipe-wisma') }}" class="btn btn-homestead-primary px-4">
                                LIHAT TIPE WISMA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homestead-features">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="homestead-feature-title">
                                HOMESTEAD WISMA YANG NYAMAN<br /> UNTUK ANDA
                            </div>
                            <div class="homestead-feature-subtitle">
                                Homestead merupakan sarana penginapan untuk tempat istirahat Anda dengan nyaman dan
                                berkualitas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homestead-category">
        <div class="container">
            <div class="row">
                @php
                    $incrementType = 0
                @endphp
                @forelse ($wisma as $type)
                    <div class="col-12 col-md-6" data-aos="fade-up-right" data-aos-delay="{{ $incrementType += 100 }}">
                        <div class="category-container">
                            <img src="{{ asset('photo/' . $type->photo) }}" alt="" class="w-100 img-fluid">
                            <div class="desc">
                                <h5 class="text-uppercase">{{ $type->name }}</h5>
                                <a href="{{ route('wisma', $type->uuid) }}" class="link-homestead btn px-4">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12" data-aos="fade-up-right" data-aos-delay="100">
                        No Type Was Found
                    </div>
                @endforelse
                
                {{-- <div class="col-12 col-md-6" data-aos="fade-up-left" data-aos-delay="250">
                    <div class="category-container">
                        <img src="images/img-category-2.png" alt="" class="w-100 img-fluid">
                        <div class="desc">
                            <h5>SPBU BATANGTORU</h5>
                            <a href="{{ route('spbu-batangtoru') }}" class="link-homestead btn px-4">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="homestead-features-room">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up">
                    <h5>FASILITAS YANG DISEDIAKAN</h5>
                    <p class="subtitle-features">
                        Beberapa fasilitas untuk Anda dari <span>HOMESTEAD</span>
                    </p>
                </div>
            </div>
            <div class="row">
                @forelse ($room as $item)
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url('{{ asset('photo/' . $item->photo) }}');">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">{{$item->name}}</div>
                                    <div class="tipe-wisma">
                                        {{$item->wisma->name}}
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <div class="product-price">{{"Rp " . number_format($item->price, 0, ",", ".")}}</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                {{$item->facility}}
                            </div>
                            <a href="https://wa.me/{{$item->wisma->telephone}}" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center">
                        No Data
                    </div>
                @endforelse
               
                {{-- <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/wks-superior.png);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Kamar Superior</div>
                                    <div class="tipe-wisma">
                                        Wisma Kurnia Sejahtera
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-price">Rp 250.000/Malam</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                twin bed, tv, lemari 2 pintu, kamar mandi, water heater, AC, meja rias, WI-FI.
                            </div>
                            <a href="https://wa.me/+6281279916034" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/wks-deluxe.jpg);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Kamar Deluxe</div>
                                    <div class="tipe-wisma">
                                        Wisma Kurnia Sejahtera
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-price">Rp 200.000/Malam</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                twin bed, tv, lemari 2 pintu, kamar mandi, AC, meja rias, WI-FI.
                            </div>
                            <a href="https://wa.me/+6281279916034" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/wks-meeting.jpg);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Ruangan Meeting</div>
                                    <div class="tipe-wisma">
                                        Wisma Kurnia Sejahtera
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <div class="product-price">Rp 2.000.000/Hari</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                meja dan kursi, sound system, AC, proyektor, snack. Kapasitas 20 orang.
                            </div>
                            <a href="https://wa.me/+6281279916034" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/spbu-125.jpg);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Kamar 125</div>
                                    <div class="tipe-wisma">
                                        SPBU Batangtoru
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-price">Rp 125.000/Malam</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                twin bed, kamar mandi, WI-FI.
                            </div>
                            <a href="https://wa.me/+62634000370467" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/spbu-180.jpg);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Kamar 180</div>
                                    <div class="tipe-wisma">
                                        SPBU Batangtoru
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-price">Rp 180.000/Malam</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                twin bed, tv, lemari 2 pintu, kamar mandi, wastafel, meja rias, WI-FI.
                            </div>
                            <a href="https://wa.me/+62634000370467" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</div>
@endsection