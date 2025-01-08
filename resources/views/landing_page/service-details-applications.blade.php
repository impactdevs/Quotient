@extends('landing_page.starter-page') 

@section('title', 'Service Details') 

@section('content')
<div class="page-title" >
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Application Service Details</h1>
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

        <h4>Application filtration</h4>
        <p>A well-designed application filtration system, such as Quotient, streamlines the hiring process by efficiently filtering and shortlisting job applications. It minimizes manual effort, reduces biases, and ensures that only the most qualified candidates move forward in the recruitment pipeline.</p>
      </div>

      <div class="col-lg-6" >
        
        <h3>Application filtration strategy</h3>
        <p>
          Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
          <br>
          Implementing a structured application filtration strategy provides numerous advantages for organizations:
        </p>
        
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Faster Recruitment Process
          Automating the screening of resumes significantly reduces the time required to review applications, enabling faster hiring decisions.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Improved Quality of Hires
          Quotient evaluates applications against predefined criteria, ensuring only candidates who meet job requirements are shortlisted, leading to better hiring outcomes..</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Reduced Human Bias
          The system applies consistent filters, promoting fairness and diversity by minimizing unconscious biases during the selection process.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Data-Driven Insights
          The system provides analytics and reports to help HR teams monitor hiring trends, optimize job postings, and refine recruitment strategies.</span></li>
          <li><i class="bi bi-check-circle"></i> <span> Scalability
          Quotient handles high volumes of applications without compromising accuracy, making it ideal for organizations hiring at scale.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Cost Efficiency
          Automation reduces administrative overhead, allowing HR teams to focus on strategic hiring initiatives rather than manual tasks.</span></li>
        </ul>
        <h3>Key Features of Quotient’s Filtration System</h3>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Customizable Filters: Tailor screening criteria to suit specific job roles.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Keyword Matching: Identify resumes that align with job descriptions.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Integration with Applicant Tracking Systems (ATS): Ensure seamless data management.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Automated Ranking: Rank applicants based on qualifications and relevance.
          </span></li>
          <li><i class="bi bi-check-circle"></i> <span> Notifications and Alerts: Keep candidates and recruiters updated throughout the process.</span></li>
        </ul>
        <br>
        <p>
        Quotient simplifies recruitment by leveraging automation, promoting efficiency, and enhancing decision-making. Its powerful filtration tools help organizations attract top talent while saving time and resources.
        </p>
      </div>

    </div>

    </div>

  </section><!-- /Service Details Section -->

</main>

    </div>
  </div>
@endsection