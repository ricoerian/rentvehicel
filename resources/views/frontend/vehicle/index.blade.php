@extends('frontend.layout')

@section('styles')
    {{-- AOS Animation Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* Button hover transition */
        .btn-primary {
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
        /* Listing card hover */
        .listing:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('content')
<div
    class="hero inner-page"
    style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')"
    data-aos="fade-in"
    data-aos-duration="1200"
>
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="intro">
            <h1><strong>Daftar Kendaraan</strong></h1>
            <div class="custom-breadcrumbs">
              <a href="index.html">Home</a> <span class="mx-2">/</span>
              <strong>Daftar Kendaraan</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="site-section bg-light" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row">
      <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
        <h2 class="section-heading"><strong>Daftar Kendaraan</strong></h2>
        <p class="mb-5">Kami menyediakan berbagai macam Kendaraan.</p>
      </div>
    </div>

    <div class="row">
      @forelse($vehicles as $vehicle)
        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
          <div class="listing d-block align-items-stretch">
            <div class="listing-img h-100 mr-4" data-aos="zoom-in" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
              <img src="{{ Storage::url($vehicle->image) }}" alt="Image" class="img-fluid" />
            </div>
            <div class="listing-contents h-100">
              <h3>{{ $vehicle->nama_kendaraan }}</h3>
              <div class="rent-price">
                <strong>Rp{{ number_format($vehicle->price,0,",", ".") }}</strong><span class="mx-1">/</span>hari
              </div>
              <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                <div class="listing-feature pr-4">
                  <span class="caption">Pintu:</span>
                  <span class="number">{{ $vehicle->pintu }}</span>
                </div>
                <div class="listing-feature pr-4">
                  <span class="caption">Penumpang:</span>
                  <span class="number">{{ $vehicle->penumpang }}</span>
                </div>
              </div>
              <div>
                <p>{{ $vehicle->description }}</p>
                <p>
                  <a href="{{ route('vehicle.show', $vehicle) }}" class="btn btn-primary btn-sm" data-aos="fade-up" data-aos-delay="600">Sewa Sekarang</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p class="display-4 text-center mx-auto" data-aos="fade-up" data-aos-delay="200">Data yang anda cari kosong !</p>
      @endforelse
    </div>
  </div>
</div>
@endsection

@section('scripts')
    {{-- AOS Animation Script --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({ once: true });
        });
    </script>
@endsection