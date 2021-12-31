@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Het in Touch</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section class="bg-light">

        <div class="container">

            <!-- row Start -->
            <div class="row">

                <div class="col-lg-8 col-md-7">
                    <div class="prc_wrap">

                        <div class="prc_wrap_header">
                            <h4 class="property_block_title">Fillup The Form</h4>
                        </div>

                        <div class="prc_wrap-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control simple">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control simple">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control simple">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control simple"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-theme" type="submit">Submit Request</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-5">

                    <div class="prc_wrap">

                        <div class="prc_wrap_header">
                            <h4 class="property_block_title">Reach Us</h4>
                        </div>

                        <div class="prc_wrap-body">
                            <div class="contact-info">

                                <h2>Get In Touch</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>

                                <div class="cn-info-detail">
                                    <div class="cn-info-icon">
                                        <i class="ti-home"></i>
                                    </div>
                                    <div class="cn-info-content">
                                        <h4 class="cn-info-title">Reach Us</h4>
                                        2512, New Market,<br>Eliza Road, Sincher 80 CA,<br>Canada, USA
                                    </div>
                                </div>

                                <div class="cn-info-detail">
                                    <div class="cn-info-icon">
                                        <i class="ti-email"></i>
                                    </div>
                                    <div class="cn-info-content">
                                        <h4 class="cn-info-title">Drop A Mail</h4>
                                        support@Rikada.com<br>Rikada@gmail.com
                                    </div>
                                </div>

                                <div class="cn-info-detail">
                                    <div class="cn-info-icon">
                                        <i class="ti-mobile"></i>
                                    </div>
                                    <div class="cn-info-content">
                                        <h4 class="cn-info-title">Call Us</h4>
                                        (41) 123 521 458<br>+91 235 548 7548
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->
@endsection
