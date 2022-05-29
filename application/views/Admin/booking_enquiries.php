<!-- Content Area-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booking Enquiries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Booking Enquiries</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control booking_date_report" id="1" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>

            <div class="row mt-3">
                <div class="card w-full">
                    <div class="card-body">
                        <table class="table table-bordered table-striped w-100 booking_enq_list" id="booking_enq_list">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Date</th>
                                    <th>Returning or New</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Street Address</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Drop Of Date</th>
                                    <th>Drop Of ETA</th>
                                    <th>Pick Up Date</th>
                                    <th>Collection To ETA</th>
                                    <th>Animal Booking For</th>
                                    <th>Animal Name</th>
                                    <th>Is Animal Desexed</th>
                                    <th>Is the animals vaccines current and meet our vaccine requirements?</th>
                                    <th>Animal Age</th>
                                    <th>Animal Date of Birth</th>
                                    <th>Animal Gender</th>
                                    <th>Animal Breed</th>
                                    <th>Current vet clinic</th>
                                    <th>Any medications required?</th>
                                    <th>Are there any behaviour issues we need to be made aware of?</th>
                                    <th>Sharing accomodation and play time?</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>