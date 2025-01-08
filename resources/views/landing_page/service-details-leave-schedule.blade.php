@extends('landing_page.starter-page') 

@section('title', 'Service Details') 

@section('content')
<div class="page-title" >
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Leave Schedule Service Details</h1>
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

        <h4>Leave Schedule</h4>
        <p>
        Quotient simplifies leave scheduling, making it seamless and efficient to balance employee rest periods and duty times. By utilizing its intuitive system, Quotient ensures there are no overlapping schedules, minimizing disruptions to operational workflows. This approach maximizes employee satisfaction and maintains productivity across the organization.
        </p>
        <p>
        Benefits of a Well-Managed Leave Schedule:
        Improved Employee Morale: Proper rest periods enhance job satisfaction and performance.
        Minimized Scheduling Conflicts: Avoiding date overlaps ensures consistent staff availability.
        Data-Driven Insights: The system provides reports on leave trends, helping HR make informed decisions.
        </p>
      </div>

      <div class="col-lg-6" >
        
        <h3>Industry Standard Strategies.</h3>
        <p>
        Effective leave management is crucial for sustaining a productive and motivated workforce. Implementing industry-standard strategies within the Quotient system guarantees fair, transparent, and well-organized scheduling processes.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Ensure Compliance with Labor Laws: Quotient integrates with legal frameworks, ensuring all leave policies meet industry regulations and standards.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Promote Work-Life Balance: Encouraging employees to utilize their leave entitlements supports mental and physical well-being.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Automate Leave Requests and Approvals: With automated processes, managers can efficiently handle leave requests while employees enjoy a straightforward application process.</span></li>
        </ul>
        <p>
          Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
        </p>
        <p>
          Quotient empowers organizations to establish a fair and efficient leave system, reducing administrative burdens and fostering a positive workplace culture. Through automation and strategic planning, the organization can maintain high productivity levels while prioritizing employee well-being.
        </p>
      </div>

    </div>

    </div>

  </section><!-- /Service Details Section -->

</main>

    </div>
  </div>
@endsection