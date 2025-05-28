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
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        /* Listing card hover */
        .listing:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
<div class="hero" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')" data-aos="fade-in" data-aos-duration="1200">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-10">
          <div class="row mb-5">
            <div class="col-lg-7 intro" data-aos="fade-up" data-aos-delay="200">
              <h1><strong>Sewa Kendaraan</strong> Dengan Satu Sentuhan.</h1>
            </div>
          </div>

          <form class="trip-form" method="get" action="{{ route('vehicle.index') }}" data-aos="fade-up" data-aos-delay="400">
            <div class="row align-items-center">
              <div class="mb-3 mb-md-0 col-md-4" data-aos="fade-up" data-aos-delay="600">
                <select name="category_id" id="category_id" class="custom-select form-control">
                  <option value="">Pilih Jenis Kendaraan</option>
                  @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3 mb-md-0 col-md-4" data-aos="fade-up" data-aos-delay="800">
                <select name="penumpang" id="penumpang" class="custom-select form-control">
                  <option value="">Jumlah Penumpang</option>
                  @for($i=1; $i<=7; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>

              <div class="mb-3 mb-md-0 col-md-4" data-aos="fade-up" data-aos-delay="1000">
                <input
                  type="submit"
                  value="Cari"
                  class="btn btn-primary btn-block py-3"
                />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <h2 class="section-heading"><strong>Cara Pemesanan</strong></h2>
      <p class="mb-5">Langkah yang mudah untuk menyewa kendaraan</p>

      <div class="row mb-5">
        <!-- Step 1 -->
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="flip-left" data-aos-delay="200">
          <div class="step">
            <span>1</span>
            <div class="step-inner">
              <span class="number text-primary">01.</span>
              <h3>Pilih Kendaraan</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!
              </p>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="flip-left" data-aos-delay="400">
          <div class="step">
            <span>2</span>
            <div class="step-inner">
              <span class="number text-primary">02.</span>
              <h3>Isi Form</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!
              </p>
            </div>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="flip-left" data-aos-delay="600">
          <div class="step">
            <span>3</span>
            <div class="step-inner">
              <span class="number text-primary">03.</span>
              <h3>Menunggu Pesan</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, laboriosam!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 text-center order-lg-2" data-aos="zoom-in" data-aos-delay="300">
          <div class="img-wrap-1 mb-5">
            <img
              src="{{ asset('frontend/images/feature_01.png') }}"
              alt="Image"
              class="img-fluid"
            />
          </div>
        </div>
        <div class="col-lg-4 ml-auto order-lg-1" data-aos="fade-right" data-aos-delay="500">
          <h3 class="mb-4 section-heading">
            <strong>Kami berkomitmen untuk memberikan pelayanan terbaik</strong>
          </h3>
          <p class="mb-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Repudiandae, explicabo iste a labore id est quas, doloremque
            veritatis! Provident odit pariatur dolorem quisquam,
            voluptatibus voluptates optio accusamus, vel quasi quidem!
          </p>

          <p><a href="/kontak" class="btn btn-primary">Kontak Kami</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="section-heading"><strong>Daftar Kendaraan</strong></h2>
          <p class="mb-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
      </div>

      <div class="row">
      @foreach($vehicles as $vehicle)
        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="listing d-block align-items-stretch">
            <div class="listing-img h-100 mr-4" data-aos="zoom-in" data-aos-delay="400">
              <img width="300" height="300" src="{{ Storage::url($vehicle->image) }}" alt="Image" class="img-fluid" />
            </div>
            <div class="listing-contents h-100">
              <h3>{{ $vehicle->nama_kendaraan }}</h3>
              <div class="rent-price">
                <strong>Rp{{ number_format($vehicle->price,0,",", ".") }}</strong><span class="mx-1">/</span>hari
              </div>
              <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                @if(!is_null($vehicle->pintu))
                  <div class="listing-feature pr-4">
                    <span class="caption">Pintu:</span>
                    <span class="number">{{ $vehicle->pintu }}</span>
                  </div>
                @endif
                <div class="listing-feature pr-4">
                  <span class="caption">Penumpang:</span>
                  <span class="number">{{ $vehicle->penumpang }}</span>
                </div>
              </div>
              <div>
                <p>
                 {{ $vehicle->description}}
                </p>
                <p>
                  <a href="{{ route('vehicle.show', $vehicle) }}" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>

  <div class="site-section bg-light" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="section-heading"><strong>Testimonial</strong></h2>
          <p class="mb-5">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
      </div>
      <div class="row">
      @foreach($testimonials as $testimonial)
        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-2">
            <blockquote class="mb-4">
              <p>
               {{ $testimonial->pesan }}
              </p>
            </blockquote>
            <div class="d-flex v-vehicled align-items-center" data-aos="fade-right" data-aos-delay="400">
              <img
                src="{{ Storage::url($testimonial->profile) }}"
                alt="Image"
                style="object-fit:cover;width: 80px;height:80px;"
                class="img-fluid mr-3"
              />
              <div class="author-name">
                <span class="d-block">{{ $testimonial->name }}</span>
                <span>{{ $testimonial->pekerjaan }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
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