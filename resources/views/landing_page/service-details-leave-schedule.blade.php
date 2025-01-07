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
          Quotient makes leave scheduling easy and efficient to facilitate employee rest time and employee duty time to avoid date collisions that would affect employee availability.
        </p>
      </div>

      <div class="col-lg-6" >
        
        <h3>Industry Standard Strategies.</h3>
        <p>
          Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
        </ul>
        <p>
          Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
        </p>
        <p>
          Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.
        </p>
      </div>

    </div>

    </div>

  </section><!-- /Service Details Section -->

</main>

    </div>
  </div>
@endsection