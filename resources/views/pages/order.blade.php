@extends('frontend.app')

@section('title')
    Pesan Wisma Homestead
@endsection

@section('content')
<div class="page-content page-home">
    <section class="homestead-order">
        <div class="page-order">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card shadow">
                            <img src="images/wks-aula.png" class="card-img-top" alt="Wisma">
                            <div class="card-body">
                                <h2 class="card-title">Wisma Kurnia Sejahtera</h2>
                                <p class="card-text">Jl. H. Ihutan Ritonga, Ujung Padang, Padangsidimpuan Selatan,
                                    Kota Padang Sidempuan, Sumatera Utara 22711</p>
                            </div>
                            <div class="card-body card-p">
                                <div class="row">
                                    <div class="col col-xs-4">
                                        <a href="tel:+6281279916034" class="btn btn-homestead" data-toggle="tooltip"
                                            data-placement="top" title="Hubungi Melalui Telepon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-telephone-forward-fill"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>
                                        <a href="https://wa.me/+6281279916034" class="btn btn-homestead"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Hubungi Melalui Whatsapp">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-chat-dots-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                        <div class="card shadow">
                            <img src="images/spbu-200.jpg" class="card-img-top" alt="">
                            <div class="card-body">
                                <h2 class="card-title">SPBU Batangtoru</h2>
                                <p class="card-text">Desa Sumuran, Batang Toru, Kabupaten Tapanuli Selatan, Sumatera
                                    Utara 22738</p>
                            </div>
                            <div class="card-body card-p">
                                <div class="row">
                                    <div class="col col-xs-4">
                                        <a href="tel:+62634000370467" class="btn btn-homestead"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Hubungi Melalui Telepon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-telephone-forward-fill"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </a>
                                        <a href="https://wa.me/+62634000370467" class="btn btn-homestead"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Hubungi Melalui Whatsapp">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-chat-dots-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection