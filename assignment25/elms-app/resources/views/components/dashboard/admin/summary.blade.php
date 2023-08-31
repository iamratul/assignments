<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mamduh</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- start summary -->
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white shadow">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h3 class="mb-0 text-capitalize font-weight-bold" id="totalEvents">000</h3>
                                <p class="mb-0 text-sm">Total Employee</p>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-success shadow float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white shadow">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h3 class="mb-0 text-capitalize font-weight-bold" id="ticketSales">000</h3>
                                <p class="mb-0 text-sm">Income</p>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-danger shadow float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white shadow">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h3 class="mb-0 text-capitalize font-weight-bold" id="balance">000</h3>
                                <p class="mb-0 text-sm">Expense</p>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white shadow">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h3 class="mb-0 text-capitalize font-weight-bold" id="balance">000</h3>
                                <p class="mb-0 text-sm">Balance</p>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-secondary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end summary -->

    <!-- start leave request -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Leave Request Summary</h4>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Reason</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                <tr>
                                    <td>Charles Casey</td>
                                    <td>Web Developer</td>
                                    <td>Travel with family</td>
                                    <td>01 Apr, 2021</td>
                                    <td>04 Apr, 2021</td>
                                    <td>Pending</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Alex Adams</h6>
                                    </td>
                                    <td>Python Developer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive
                                        </div>
                                    </td>
                                    <td>
                                        28
                                    </td>
                                    <td>
                                        01 Aug, 2021
                                    </td>
                                    <td>$25,060</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Prezy Kelsey</h6>
                                    </td>
                                    <td>Senior Javascript Developer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </div>
                                    </td>
                                    <td>
                                        35
                                    </td>
                                    <td>
                                        15 Jun, 2021
                                    </td>
                                    <td>$59,350</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Ruhi Fancher</h6>
                                    </td>
                                    <td>React Developer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </div>
                                    </td>
                                    <td>
                                        25
                                    </td>
                                    <td>
                                        01 March, 2021
                                    </td>
                                    <td>$23,700</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Juliet Pineda</h6>
                                    </td>
                                    <td>Senior Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </div>
                                    </td>
                                    <td>
                                        38
                                    </td>
                                    <td>
                                        01 Jan, 2021
                                    </td>
                                    <td>$69,185</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Den Simpson</h6>
                                    </td>
                                    <td>Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive
                                        </div>
                                    </td>
                                    <td>
                                        21
                                    </td>
                                    <td>
                                        01 Sep, 2021
                                    </td>
                                    <td>$37,845</td>
                                </tr>
                                <!-- end -->
                                <tr>
                                    <td>
                                        <h6 class="mb-0">Mahek Torres</h6>
                                    </td>
                                    <td>Senior Laravel Developer</td>
                                    <td>
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </div>
                                    </td>
                                    <td>
                                        32
                                    </td>
                                    <td>
                                        20 May, 2021
                                    </td>
                                    <td>$55,100</td>
                                </tr>
                                <!-- end -->
                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                    </div>
                </div><!-- end card -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end leave request -->
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Upcube.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div>
        </div>
    </div>
</footer>
