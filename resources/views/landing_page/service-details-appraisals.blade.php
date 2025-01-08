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

        <h4>Employee Appraisals</h4>
        <p>At Quotient, we understand the importance of measuring employee performance and recognizing their contributions to the organization. With advanced technology, we bridge the gap between productivity monitoring and effective feedback, ensuring that employee appraisals drive growth and development.</p>
      </div>

      <div class="col-lg-6">
        <h3>Our Approach to Employee Appraisals</h3>
        <p>
          Quotient's appraisal strategy is built on fostering collaboration, enhancing productivity, and ensuring well-balanced work schedules. By integrating leave management and performance analysis, we empower businesses to optimize their workforce while ensuring employee well-being.
        </p>
        <p>
          Below are the key pillars that support this strategy and position Quotient as an industry leader in appraisal systems:
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Promoting teamwork through team-building training and travel opportunities.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Streamlining recruitment with a competitive job application filtering process.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Encouraging engagement through company events and outreach programs.</span></li>
        </ul>
        <p>
          These strategies ensure that Quotient supports continuous organizational growth and employee development. By focusing on the alignment of rest and work hours, we facilitate an environment where productivity can thrive.
        </p>
        <p>
          Quotient also empowers businesses with in-depth analytical data on employee performance, tracking key factors like leave usage, efficiency, and overall productivity. This data-driven approach enables companies to make informed decisions that benefit both the organization and its employees.
        </p>
      </div>
    </div>
</div>


    </div>

  </section>

</main>

    </div>
  </div>
@endsection