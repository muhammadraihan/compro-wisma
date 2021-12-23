@extends('frontend.app')

@section('title')
    {{$wisma->name}}
@endsection

@section('content')
<div class="page-content page-home">
    <section class="homestead-type-container">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-right" data-aos-delay="200">
                    <div class="name-homestead">
                        {{ $wisma->name }}
                    </div>
                    <div class="desc">
                        <p>
                            {{$wisma->address}}
                        </p>
                        <p>
                            Kontak: {{$wisma->telephone}} <span><a href="tel:{{$wisma->telephone}}"
                                    class="btn btn-outline-dark btn-outline-homestead" data-toggle="tooltip"
                                    data-placement="top" title="Hubungi Melalui Telepon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg></a></span>
                            <span><a href="https://wa.me/{{$wisma->telephone}}"
                                    class="btn btn-outline-dark btn-outline-homestead" data-toggle="tooltip"
                                    data-placement="top" title="Hubungi Melalui Whatsapp"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg></a></span>
                        </p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row mt-4">
                @forelse ($room as $roomList)
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url('{{ asset('photo/' . $roomList->photo) }}');">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">{{ $roomList->name }}</div>
                                    <div class="tipe-wisma">
                                        {{$wisma->name}}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-price">{{"Rp " . number_format($roomList->price, 0, ",", ".")}}</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                {{$roomList->facility}}
                            </div>
                            <a href="https://wa.me/{{$wisma->telephone}}" class="btn btn-wa btn-block">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center">
                        No Data Was Found
                    </div>
                @endforelse
                {{-- <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
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
                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="component-products d-block">
                        <div class="product-thumbnail">
                            <div class="product-img" style="background-image: url(images/wks-aula.png);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Aula</div>
                                    <div class="tipe-wisma">
                                        Wisma Kurnia Sejahtera
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <div class="product-price">Rp 3.500.000/Hari</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                meja dan kursi, sound system, AC, proyektor, kamar rias, balkon, kamar mandi.
                                Kapasitas ± 300 orang.
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
                            <div class="product-img" style="background-image: url(images/wks-ruko.png);">
                            </div>
                        </div>
                        <div class="wisma-type-container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col">
                                    <div class="product-text">Ruko</div>
                                    <div class="tipe-wisma">
                                        Wisma Kurnia Sejahtera
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <div class="product-price">Rp 11.000.000/Tahun</div>
                                </div>
                            </div>
                            <div class="fasilitas-wisma">
                                <span>Fasilitas:</span>
                                ukuran 4x12 meter dengan satu ruangan, kamar mandi, dan parkiran.
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
                </div> --}}
            </div>
        </div>
    </section>
</div>
@endsection