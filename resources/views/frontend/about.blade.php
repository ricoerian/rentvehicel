@extends('frontend.layout')

@section('styles')
    <style>
        /* Hero overlay transition */
        .hero.inner-page {
            transition: background-position 0.5s ease;
        }
        .hero.inner-page:hover {
            background-position: center top;
        }
        /* Image rounded hover effect */
        .site-section img.rounded {
            transition: transform 0.3s ease;
        }
        .site-section img.rounded:hover {
            transform: scale(1.05);
        }
        /* Team card hover */
        .person-1 {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .person-1:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');"
     data-aos="fade-in" data-aos-duration="1200">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="intro">
            <h1><strong>About</strong></h1>
            <div class="custom-breadcrumbs">
              <a href="{{ url('/') }}">Home</a>
              <span class="mx-2">/</span>
              <strong>About</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="site-section" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2" data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('frontend/images/hero_2.jpg') }}" alt="Image" class="img-fluid rounded">
      </div>
      <div class="col-lg-4 mr-auto" data-aos="fade-left" data-aos-delay="500">
        <h2>SewaKendaraan.id</h2>
        <p>{{ $setting->tentang_perusahaan }}</p>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row justify-content-center text-center mb-5 section-2-title">
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <h2 class="mb-4">Meet Our Team</h2>
      </div>
    </div>
    <div class="row align-items-stretch">

      @foreach($teams as $team)
      <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
        <div class="post-entry-1 h-100 person-1" data-aos="fade-up" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
          <img style="object-fit:cover;height: 80px;width:80px;" src="{{ Storage::url($team->photo) }}" alt="Image"
               class="img-fluid mb-3" data-aos="zoom-in" data-aos-delay="{{ 500 + ($loop->index * 100) }}">
          <div class="post-entry-1-contents">
            <span class="meta">{{ $team->jabatan }}</span>
            <h2>{{ $team->nama }}</h2>
            <p>{{ $team->bio }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<div class="site-section" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('frontend/images/hero_1.jpg') }}" alt="Image" class="img-fluid rounded">
      </div>
      <div class="col-lg-4 ml-auto" data-aos="fade-right" data-aos-delay="500">
        <h2>Our History</h2>
        <p>{{ $setting->sejarah_perusahaan }}</p>
      </div>
    </div>
  </div>
</div>
@endsection