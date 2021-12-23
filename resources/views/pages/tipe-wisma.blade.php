@extends('frontend.app')

@section('title')
    Tipe Wisma Homestead
@endsection

@section('content')
<div class="page-content page-home">
    <section class="homestead-category">
        <div class="container">
            <div class="page-tipe-wisma">
                <div class="row">
                    <div class="col-12 col-md-6" data-aos="fade-up-right" data-aos-delay="200">
                        <div class="category-container">
                            <img src="images/img-category-1.png" alt="" class="w-100 img-fluid">
                            <div class="desc">
                                <h5>WISMA KURNIA SEJAHTERA</h5>
                                <a href="wisma-kurnia.html" class="link-homestead btn px-4">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" data-aos="fade-up-left" data-aos-delay="250">
                        <div class="category-container">
                            <img src="images/img-category-2.png" alt="" class="w-100 img-fluid">
                            <div class="desc">
                                <h5>SPBU BATANGTORU</h5>
                                <a href="spbu-batangtoru.html" class="link-homestead btn px-4">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection