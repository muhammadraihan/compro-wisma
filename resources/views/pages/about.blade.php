@extends('frontend.app')

@section('title')
    Tentang Homestead
@endsection

@section('content')
<div class="page-content page-home">
    <section class="homestead-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-right" data-aos-delay="200">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="little-title">
                                TENTANG HOMESTEAD
                            </div>
                            <div class="big-title text-uppercase">
                                sarana penginapan yang<br />berkualitas dengan harga<br />terjangkau.
                            </div>
                            <div class="subtitle">
                                Homestead menyediakan sarana penginapan dan gedung -gedung dengan fasilitas yang
                                baik, nyaman dengan harga yang terjangkau.
                            </div>
                        </div>
                        <div class="col-12 col-md-6" data-aos="fade-left" data-aos-delay="300">
                            <img src="images/img-about.png" alt="Hero" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homestead-features-about">
        <div class="container">
            <div class="row d-flex justify-content-center-align-items-center">
                <div class="col-12">
                    <div class="row d-flex justify-content-center-align-items-center">
                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="card">
                                <div class="card-body">
                                    <img src="images/icon-comfort.png" alt="">
                                    <h5>
                                        FASILITAS TERBAIK
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                            <div class="card">
                                <div class="card-body">
                                    <img src="images/icon-easy.png" alt="">
                                    <h5>
                                        PELAYANAN TERBAIK
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                            <div class="card">
                                <div class="card-body">
                                    <img src="images/icon-affordable.png" alt="">
                                    <h5>
                                        HARGA TERJANGKAU
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                            <div class="card">
                                <div class="card-body">
                                    <img src="images/icon-24h.png" alt="">
                                    <h5>
                                        24 JAM PEMESANAN
                                    </h5>
                                </div>
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
                <div class="col-12 col-md-6" data-aos="fade-up-right" data-aos-delay="400">
                    <div class="category-container">
                        <img src="images/img-category-1.png" alt="" class="w-100 img-fluid">
                        <div class="desc">
                            <h5>WISMA KURNIA SEJAHTERA</h5>
                            <a href="{{ route('wisma-kurnia') }}" class="link-homestead btn px-4">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" data-aos="fade-up-left" data-aos-delay="500">
                    <div class="category-container">
                        <img src="images/img-category-2.png" alt="" class="w-100 img-fluid">
                        <div class="desc">
                            <h5>SPBU BATANGTORU</h5>
                            <a href="{{ route('spbu-batangtoru') }}" class="link-homestead btn px-4">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection