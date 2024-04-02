@extends('layout.app')

@section('contents')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/team-header.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center">

    <h2>Dealers</h2>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Our Dealers</h2>

    </div>

    <div class="row gy-4">

    @foreach($users as $user)

      <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">

          
          <img src="{{ asset('storage/dealercontainer/' . $user->image) }}" class="img-fluid" alt="">

            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>{{$user->name}}</h4>
            <span>{{ $user->image }}</span>
          </div>
        </div>
      </div><!-- End Team Member -->


  @endforeach


    </div>

  </div>
</section><!-- End Team Section -->

</main><!-- End #main -->


   @endsection