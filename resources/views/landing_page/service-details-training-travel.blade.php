@extends('landing_page.starter-page') 

@section('title', 'Service Details') 

@section('content')
<div class="page-title" >
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Training and Travel Service Details</h1>
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

        <h4>Training and Travel</h4>
        <p>At Quotient, we believe that investing in employee training and travel opportunities plays a critical role in enhancing teamwork, boosting collaboration, and improving overall productivity. By offering training sessions and travel experiences, we create an environment where employees can develop both professionally and personally, further contributing to the success of the organization.</p>
      </div>

      <div class="col-lg-6">
        <h3>Our Industry-Leading Approach</h3>
        <p>
          Quotient’s strategy revolves around fostering employee growth through continuous learning and collaboration. Training and travel are key components of this approach, ensuring that employees are not only skilled but also well-connected within teams, improving both their individual and collective contributions to the company.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Promoting team collaboration through targeted training programs.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Enhancing employee engagement with rewarding travel opportunities.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Expanding skillsets to adapt to changing industry demands.</span></li>
        </ul>
        <p>
          With these strategies, Quotient ensures that employees are well-equipped to tackle challenges, while fostering a culture of unity and shared purpose. Training and travel also contribute to increased morale, stronger communication, and improved problem-solving capabilities across teams.
        </p>
        <p>
          By leveraging innovative approaches to training and travel, Quotient positions itself at the forefront of employee development. We enable businesses to cultivate a more adaptable and cohesive workforce, ultimately leading to enhanced business outcomes and long-term success.
        </p>
      </div>

    </div>


    </div>

  </section><!-- /Service Details Section -->

</main>

    </div>
  </div>
@endsection