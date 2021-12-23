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
                </div>
            </div>
        </div>
    </section>
</div>
@endsection