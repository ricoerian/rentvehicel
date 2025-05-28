@extends('frontend.layout')

@section('styles')
    <style>
        /* Hover transition for post cards */
        .post-entry-1 {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .post-entry-1:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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
            <h1><strong>Blog</strong></h1>
            <div class="custom-breadcrumbs">
              <a href="{{ url('/') }}">Home</a>
              <span class="mx-2">/</span>
              <strong>Blog</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="site-section bg-light" data-aos="fade-up" data-aos-duration="1000">
  <div class="container">
    <div class="row">

      @forelse($blogs as $blog)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
          <div class="post-entry-1 h-100">
            <a href="{{ route('blog.show', $blog->slug) }}" data-aos="zoom-in" data-aos-delay="{{ 300 + ($loop->index * 100) }}">
              <img src="{{ Storage::url($blog->image) }}" alt="Image" class="img-fluid">
            </a>
            <div class="post-entry-1-contents" data-aos="fade-up" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
              <h2>
                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
              </h2>
              <span class="meta d-inline-block mb-3">
                {{ date('M d, Y', strtotime($blog->created_at)) }}
              </span>
              <p>{{ $blog->excerpt }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12" data-aos="fade-up" data-aos-delay="200">
          <p class="display-4 text-center mx-auto">Data yang anda cari kosong !</p>
        </div>
      @endforelse

    </div>
  </div>
</div>
@endsection