<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Quotient</title>
    <meta name="description" content="Quotient HR system.">
    {{-- @include('meta::manager') --}}
    <meta name="keywords"
        content="quotient, hr system, leave management, impact outsourcing, human resource management system, expense management system">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/home-logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/home-logo.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/landing_page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing_page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing_page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing_page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/landing_page/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/home-logo.png') }}" alt="">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}

            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/landing') }}" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="/docs">User Manual</a></li>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="/login">Get Started</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="section hero light-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Better digital Human resource management with Quotient.</h1>
                        <p>Quotient is a comprehensive software solution designed to streamline and automate HR
                            processes within an organization.</p>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos-delay="100">
                        <img src="{{ asset('assets/landing_page/assets/img/1.jpg') }}" class="img-fluid animated"
                            alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="section about">

            <div class="container">

                <div class="row gy-3">

                    <div class="col-lg-6" data-aos-delay="100">
                        <img src="{{ asset('assets/landing_page/assets/img/5.jpg') }}" alt=""
                            class="img-fluid mb5">
                        <img src="{{ asset('assets/landing_page/assets/img/4.jpg') }}" alt=""
                            class="img-fluid mt-5">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos-delay="200">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3>Quotient integrates various functions such as recruitment, employee leaves, performance
                                management, etc.</h3>
                            <p class="fst-italic">
                                This system allows HR professionals to focus on strategic initiatives, while employees
                                benefit from seamless access to their information and self-service options.
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-diagram-3"></i>
                                    <div>
                                        <h4>Perfection.</h4>
                                        <p> Quotient redefines precision in HR management. From automating leave
                                            tracking and employee management to ensuring attendance records are
                                            flawless, the system eliminates the risk of manual errors. Every process is
                                            seamlessly aligned with company policies, offering consistent results across
                                            the board. With real-time data analytics and accurate reporting, HR teams
                                            can make informed decisions confidently. </p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-fullscreen-exit"></i>
                                    <div>
                                        <h4>Productivity.</h4>
                                        <p>Boost your team's productivity with Quotient's smart automation. By taking
                                            care of repetitive HR tasks, the system frees up valuable time, allowing HR
                                            professionals to focus on strategic initiatives. Employees can access
                                            self-service tools to request leaves, check attendance, or view their
                                            records effortlessly, reducing unnecessary back-and-forth communication.
                                            With streamlined operations and more time for what truly matters, Quotient
                                            empowers both HR teams and employees to achieve more.</p>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                On the other hand, travel opportunities, whether for conferences, workshops, or
                                networking events, expose employees to new ideas, industry trends, and global best
                                practices. This broadens their perspective and helps them develop a more strategic
                                approach to their work.
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Services</h2>
                <p>The services provided by Quotient are immeasurable, with benefits that extend beyond the boundaries
                    of any organization, thanks to its focus on effectiveness and efficiency.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="{{ url('/service-details-appraisals') }}"
                                    class="stretched-link">Expenses</a></h4>
                            <p>
                                Quotient simplifies the process of managing employee expenses, from submission to approval
                                and reimbursement. Employees can easily submit expense claims through the system, attaching
                                receipts and other supporting documents for verification. Managers can review and approve
                                these claims quickly, ensuring timely reimbursement and accurate record-keeping. With
                                 </p>

                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-airplane icon"></i></div>
                            <h4><a href="{{ url('/service-details-training') }}"
                                    class="stretched-link">Payroll</a></h4>
                            <p>
                                Quotient simplifies the process of managing employee payroll, from calculating taxes like PAYE  to NSSF and other statutory deductions. Employees can easily view their payslips and tax information through the system, fostering transparency and trust. HR officers and managers gain a clear overview of payroll expenses, ensuring accurate and timely payments. With a well-organized and accessible payroll system, Quotient helps streamline workflows and avoid errors caused by manual calculations or outdated processes.
                                 </p>

                        </div>

                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-archive icon"></i></div>
                            <h4><a href="#" class="stretched-link">Leave Management</a></h4>
                            <p>Quotient streamlines the managing leave days through out the year by identifying those on
                                leave and those still having pending leave days.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="row gy-4">

                        <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-card-list icon"></i></div>
                                <h4><a href="#" class="stretched-link">Leave Roaster</a></h4>
                                <p>Quotient simplifies leave management with its intuitive leave roster feature.
                                    Employees can easily view their leave schedules alongside their teammates, fostering
                                    better planning and collaboration within teams. HR officers and managers gain a
                                    clear overview of leave patterns, ensuring adequate staffing at all times. With a
                                    well-organized and accessible leave roster, Quotient helps streamline workflows and
                                    avoid disruptions caused by overlapping leaves or unplanned absences.</p>

                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="200">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-card-checklist icon"></i></div>
                                <h4><a href="#" class="stretched-link">Attendances</a></h4>
                                <p>Quotient has a biomentric device which captures daily employee attendance and
                                    generates a report on the number of hours worked by each employee. This helps in
                                    tracking employee performance and productivity.
                                     </p>

                            </div>

                        </div><!-- End Service Item -->

                        <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="300">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-calendar2-event icon"></i></div>
                                <h4><a href="#" class="stretched-link">Events</a></h4>
                                <p>Provides a efficient way to create and manage company events led by the company
                                    throughout the year. Employees receive notifications on the emial and Quotient itself.</p>
                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-xl-3 col-md-6 d-flex" data-aos-delay="400">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-person-workspace icon"></i></div>
                                <h4><a href="#" class="stretched-link">Employees</a></h4>
                                <p>
                                    Quotient provides a centralized hub for managing employee information, from personal
                                    details and contact information to job roles and performance reviews. HR officers can
                                    easily access and update employee records, ensuring that information is accurate and
                                    up-to-date. Employees can view their profiles and submit requests for changes, fostering
                                    transparency and trust. With a well-organized and accessible employee database, Quotient
                                    helps streamline workflows and avoid errors caused by outdated or incomplete information.
                                </p>
                            </div>
                        </div><!-- End Service Item -->

                    </div>
                </div>

        </section><!-- /Services Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Frequently Asked Questions</h2>
                <p>These FAQs address common queries from potential users, providing clarity about Quotient’s features,
                    functionality, and support options.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-6" data-aos-delay="100">

                        <div class="faq-container">

                            <div class="faq-item">
                                <h3> What is Quotient?</h3>
                                <div class="faq-content">
                                    <p>Quotient is a software solution designed to simplify and automate processes such
                                        as employee leave scheduling and job application filtration, improving
                                        efficiency and accuracy in HR and organizational management.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>Who can use Quotient?</h3>
                                <div class="faq-content">
                                    <p>Quotient is ideal for businesses of all sizes, including startups, SMEs, and
                                        large enterprises, that need tools for workforce management and recruitment
                                        processes.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Does Quotient integrate with other HR or payroll systems?</h3>
                                <div class="faq-content">
                                    <p>Yes, Quotient seamlessly integrates with popular HR software, payroll systems,
                                        and applicant tracking systems (ATS) to streamline workflows.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>How does Quotient handle leave requests and approvals?</h3>
                                <div class="faq-content">
                                    <p>Quotient allows employees to submit leave requests through its portal. Managers
                                        can review, approve, or reject requests instantly, reducing delays.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->




                        </div>

                    </div><!-- End Faq Column-->

                    <div class="col-lg-6" data-aos-delay="200">

                        <div class="faq-container">


                            <div class="faq-item">
                                <h3>Does Quotient reduce hiring biases?</h3>
                                <div class="faq-content">
                                    <p>Yes, Quotient applies uniform criteria for screening applicants, promoting
                                        fairness and reducing human biases in recruitment.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Can Quotient handle bulk job applications?</h3>
                                <div class="faq-content">
                                    <p>Yes, it’s designed to process and filter large volumes of applications quickly
                                        without compromising accuracy.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Is Quotient mobile-friendly?</h3>
                                <div class="faq-content">
                                    <p>Yes, Quotient is mobile-responsive, allowing access from smartphones and tablets.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>What security measures does Quotient have in place?</h3>
                                <div class="faq-content">
                                    <p>Quotient uses encryption and secure login methods to protect sensitive data.
                                        Role-based access ensures that only authorized users can view or modify
                                        information.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->




                        </div>

                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Team</h2>
                <p>Below is the team dedicated to the development of quotient and seemlessness in product delivery.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset('assets/landing_page/assets/img/team/Gideon-Nkurungungi.webp') }}"
                                class="img-fluid" style="width: 300px; height: 300px; object-fit: cover; "
                                alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Gideon Nkurunungi</h4>
                                    <span>Managing Director</span>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos-delay="200">
                        <div class="member">
                            <img src="{{ asset('assets/landing_page/assets/img/team/eliab.jpg') }}"
                                style="width: 300px; height: 300px; object-fit: cover; " class="img-fluid"
                                alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Nuwagaba Eliab</h4>
                                    <span>Product Manager</span>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos-delay="300">
                        <div class="member">
                            <img src="{{ asset('assets/landing_page/assets/img/team/wilberforce.jpg') }}"
                                class="img-fluid" alt=""
                                style="width: 300px; height: 300px; object-fit: cover; ">

                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Nsengiyumva Wilberforce</h4>
                                    <span>Senior Software Developer</span>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos-delay="400">
                        <div class="member">
                            <img src="{{ asset('assets/landing_page/assets/img/team/david.jpg') }}" class="img-fluid"
                                style="width: 300px; height: 300px; object-fit: cover; " alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>David Ochwo</h4>
                                    <span>Junior Software Developer</span>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->



        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title">
                <h2>Contact</h2>
                <p>Contact us to know more about our products and offerings.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p> Plot 40 Martyrs Way Ntinda,</p>
                                    <p> Ntinda Rise, Kampala</p>

                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+256752364557 / +256778766500</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@quotient.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.6406698328615!2d36.80722697372735!3d-1.266546735602265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d12d8cc59d32b%3A0xf01d95ed03276b5!2sImpact%20Outsourcing-Limited!5e1!3m2!1sen!2sug!4v1736335339480!5m2!1sen!2sug"
                                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="{{ route('contact.send') }}" method="POST" class="php-email-form"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    @if (session('success'))
                                        <div class="sent-message">{{ session('success') }}</div>
                                    @endif
                                    <button type="submit">Send Message</button>
                                </div>


                                <!-- Alert Messages -->
                                @if (session('success'))
                                    <div class="sent-message">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="error-message">{{ session('error') }}</div>
                                @endif

                            </div>
                        </form>
                    </div>



                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative">


        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="/landing" class="d-flex align-items-center">
                        <span class="sitename">Quotient</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Plot 40 Martyrs Way Ntinda,</p>
                        <p>Ntinda Rise, Kampala</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+256752364557 / +256778766500</span></p>
                        <p><strong>Email:</strong> <span>info@quotient.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Leave management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Appraisals</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Leave Roaster</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Events</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Follow us on all our social media pages to keep up with us.</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Quotient</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://impactoutsourcing.co.ug/">ImpactOutsourcinig</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/landing_page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="resources/js/main.js"></script>

    <script>
        /**
         * Frequently Asked Questions Toggle
         */
        window.addEventListener('load', function(e) {
            // Add the click event listener for each faq item or toggle button
            document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
                // Logging to check that the items are selected
                console.log('click');

                // Uncomment the below line to activate the click functionality
                faqItem.addEventListener('click', function() {
                    // Toggle the 'faq-active' class on the parent element of the clicked item
                    faqItem.parentNode.classList.toggle('faq-active');
                });
            });

            document.querySelectorAll('a.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const target = document.querySelector(this.getAttribute('href'));
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });

        });
    </script>


</body>

</html>
