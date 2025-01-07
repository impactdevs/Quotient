@extends('landing_page.starter-page') 

@section('title', 'Service Details') 

@section('content')
<div class="page-title" >
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Appraisal Service Details</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Service Details</li>
        </ol>
      </nav>
    </div>
  </div>

<div class="container">
    <div class="row gy-4 mt-4">

      <div class="col-lg-6">
        <div class="services-list mb-5">
        <img src="{{ asset('assets/landing_page/assets/img/services.jpg') }}" alt="" class="img-fluid services-img">
        </div>

        <h4>Employee Appraisals.</h4>
        <p>Being able monitor your employee's productivity and contribution to the efficiency in production catches our eye as a void that should be filled by technology.</p>
      </div>

      <div class="col-lg-6" >
        
        <h3>The jist in our employee appraisal strategy.</h3>
        <p>
         With Quotient, we focus a great deal on the way team work, productivity and efficiency in production grow as a result of the balance in leave scheduling to even out rest and duty hours.
         <br>
         Below are the pillars that facilitate this industry standard and elevate our technology as an industry leader. 
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Team work through team training and travels.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Employee recruitment through a competitive job application filter.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Company events and outreach.</span></li>
        </ul>
        <p>
          With these industry standard strategies, Quotient seemlessly facilitates these activities thus fostering organisational growth and development.
        </p>
        <p>
          Quotient fosters all this by focusing on the productivity of the employees through providing analytical data on employees by focusing on environmental variables such as leave days used, employee efficiency and overall employee productivity.
        </p>
      </div>

    </div>

    </div>

  </section>

</main>

    </div>
  </div>
@endsection