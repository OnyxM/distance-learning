@extends("layouts.teacher")

@section("content")

    <!-- Row -->
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap widget-1">
                <div class="dashboard_stats_wrap_content"><h4>607</h4> <span>Listings Included</span></div>
                <div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap widget-2">
                <div class="dashboard_stats_wrap_content"><h4>102</h4> <span>Listings Remaining</span></div>
                <div class="dashboard_stats_wrap-icon"><i class="ti-pie-chart"></i></div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap widget-4">
                <div class="dashboard_stats_wrap_content"><h4>70</h4> <span>Featured Included</span></div>
                <div class="dashboard_stats_wrap-icon"><i class="ti-user"></i></div>
            </div>
        </div>

    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">

        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="course_overlay_cat">
                        <div class="course_overlay_cat_thumb">
                            <a href="#" tabindex="0"><img src="assets/img/course-1.jpg" class="img-fluid" alt=""></a>
                        </div>
                        <div class="course_overlay_cat_caption">
                            <div class="llp-left">
                                <h4><a href="#">Web Designing</a></h4>
                                <span>17 Classes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="course_overlay_cat">
                        <div class="course_overlay_cat_thumb">
                            <a href="#" tabindex="0"><img src="assets/img/course-2.jpg" class="img-fluid" alt=""></a>
                        </div>
                        <div class="course_overlay_cat_caption">
                            <div class="llp-left">
                                <h4><a href="#">Digital Marketing</a></h4>
                                <span>20 Classes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="course_overlay_cat">
                        <div class="course_overlay_cat_thumb">
                            <a href="#" tabindex="0"><img src="assets/img/course-3.jpg" class="img-fluid" alt=""></a>
                        </div>
                        <div class="course_overlay_cat_caption">
                            <div class="llp-left">
                                <h4><a href="#">Account & Chart</a></h4>
                                <span>22 Classes</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="course_overlay_cat">
                        <div class="course_overlay_cat_thumb">
                            <a href="#" tabindex="0"><img src="assets/img/course-5.jpg" class="img-fluid" alt=""></a>
                        </div>
                        <div class="course_overlay_cat_caption">
                            <div class="llp-left">
                                <h4><a href="#">Business Development</a></h4>
                                <span>10 Classes</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h6>Notifications</h6>
                </div>
                <div class="ground-list ground-hover-list">
                    <div class="ground ground-list-single">
                        <a href="#">
                            <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
                        </a>

                        <div class="ground-content">
                            <h6><a href="#">Maryam Amiri</a></h6>
                            <small class="text-fade">Check New Admin Dashboard..</small>
                            <span class="small">Just Now</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <a href="#">
                            <div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
                        </a>

                        <div class="ground-content">
                            <h6><a href="#">Maryam Amiri</a></h6>
                            <small class="text-fade">You can Customize..</small>
                            <span class="small">02 Min Ago</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <a href="#">
                            <div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
                        </a>

                        <div class="ground-content">
                            <h6><a href="#">Maryam Amiri</a></h6>
                            <small class="text-fade">Need Responsive Business Tem...</small>
                            <span class="small">10 Min Ago</span>
                        </div>
                    </div>

                    <div class="ground ground-list-single">
                        <a href="#">
                            <div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
                        </a>

                        <div class="ground-content">
                            <h6><a href="#">Maryam Amiri</a></h6>
                            <small class="text-fade">Next Meeting on Tuesday..</small>
                            <span class="small">15 Min Ago</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="dashboard_container">
                <div class="dashboard_container_header">
                    <div class="dashboard_fl_1">
                        <h4>Recent Order</h4>
                    </div>
                </div>
                <div class="dashboard_container_body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">#0000149</th>
                                <td>02 July 2020</td>
                                <td><span class="payment_status inprogress">In Progress</span></td>
                                <td>$110.00</td>
                                <td>
                                    <div class="dash_action_link">
                                        <a href="#" class="view">View</a>
                                        <a href="#" class="cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#0000150</th>
                                <td>04 July 2020</td>
                                <td><span class="payment_status complete">Completed</span></td>
                                <td>$119.00</td>
                                <td>
                                    <div class="dash_action_link">
                                        <a href="#" class="view">View</a>
                                        <a href="#" class="cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#0000151</th>
                                <td>07 July 2020</td>
                                <td><span class="payment_status complete">Completed</span></td>
                                <td>$149.00</td>
                                <td>
                                    <div class="dash_action_link">
                                        <a href="#" class="view">View</a>
                                        <a href="#" class="cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#0000152</th>
                                <td>10 July 2020</td>
                                <td><span class="payment_status pending">Pending Payment</span></td>
                                <td>$199.00</td>
                                <td>
                                    <div class="dash_action_link">
                                        <a href="#" class="view">View</a>
                                        <a href="#" class="cancel">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /Row -->
@endsection
