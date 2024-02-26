<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/form.css"); ?>">
</head>

<body>
    <div class="container" style="margin-top: 2%; margin-bottom: 2%;">
        <div class="row">
            <div class="py-5">
                <h1 class="text-danger text-center text-decoration-underline">Registration of Complaint</h1>
            </div>
            <div class="form container w-55 p-4 my-5 mt-1 border">
                <h3 class="text-center mb-4 text-decoration-underline">Applicant Person's Details</h3>
                <form action="<?php echo base_url(); ?>submit_complaint" method="post" id="myform" enctype="multipart/form-data">
                    <div class="row d-flex">
                        <div class=" col-md-6 mb-3">
                            <h5 class="">Mobile Number:</h5>
                            <input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" onkeyup="validateForm()">
                            <div id="mobile-error" class="text-danger"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Name:</h5>
                            <input type="text" name="name" class="form-control" id="name" onkeyup="validateForm()">
                            <div id="name-error" class="text-danger"></div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <h5>Gender:</h5>
                            <div class="d-flex">
                                <input class="form-check-input me-1" type="radio" name="gender" value="male" id="gender" onchange="validateForm()">
                                <label class="form-check-label me-2" for="male">Male</label>
                                <input class="form-check-input me-1" type="radio" name="gender" value="female" id="gender" onchange="validateForm()">
                                <label class="form-check-label me-2" for="female">Female</label><br>
                                <input class="form-check-input me-1" type="radio" name="gender" value="transgender" id="gender" onchange="validateForm()">
                                <label class="form-check-label me-2" for="transgender">Transgender</label><br>
                                <div id="gender-error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <h5>Landline:</h5>
                            <input type="text" id="phone" name="landline" class="form-control" maxlength="8" onkeyup="validateForm()">
                            <div id="phone-error" class="text-danger"></div>
                        </div>

                        <div class="col-md-12 form-group mb-5">
                            <h5>Street Address:</h5>
                            <textarea name="address" id="address" class="form-control" rows="3" onkeyup="validateForm()"></textarea>
                            <div id="address-error" class="text-danger"></div>
                        </div>


                        <div class="col-md-6 form-group mb-3">
                            <h5>Pin code:</h5>
                            <input type="text" id="pin_code" name="pin_code" class="form-control" maxlength="6" onkeyup="validateForm()">
                            <div id="pin_code-error" class="text-danger"></div>
                        </div>


                        <div class="col-md-6 form-group mb-5">
                            <h5>Email:</h5>
                            <input type="text" id="email" name="email" class="form-control" onkeyup="validateForm()">
                            <div id="email-error" class="text-danger"></div>
                        </div>
                        <hr style="border-top: 3px solid #000;">
                        <h3 class="text-center mb-3 text-decoration-underline">Complaint Location</h3>
                        
                        <div class="row d-flex">
                            <div class="form-group mb-3 col-md-3">
                                <h5>Area <span class="text-danger">*</span> </h5>
                                <select class="form-select" name="area[]" id="area" onchange="validateForm()">
                                    <option value="0">choose:</option>
                                    <?php foreach ($areas as $area) { ?>
                                        <option value="<?php echo $area['id']; ?>"><?php echo $area['name']; ?></option>
                                    <?php }; ?>
                                </select>
                                <div id="area-error" class="text-danger"></div>
                            </div>

                            <div class="form-group mb-3 col-md-3">
                                <h5>Locality <span class="text-danger">*</span></h5>
                                <select class="form-select" name="locality[]" id="Locality" onchange="validateForm()">
                                    <option value="0">choose:</option>

                                </select>
                                <div id="locality-error" class="text-danger"></div>
                            </div>

                            <div class="form-group mb-3 col-md-3">
                                <h5>Street <span class="text-danger">*</span></h5>
                                <select class="form-select" name="street[]" id="street" onchange="validateForm()">
                                    <option value="0">choose:</option>
                                </select>
                                <div id="street-error" class="text-danger"></div>
                            </div>

                            <div class="form-group mb-3 col-md-3">
                                <h5>Specific Location:</h5>
                                <input type="text" name="location" id="location" class="form-control" onkeyup="validateForm()"></textarea>
                                <div id="location-error" class="text-danger"></div>
                            </div>
                        </div>
                        <hr style="border-top: 3px solid #000;" class="mt-4">
                        <h3 class="text-center mt-2 mb-3 text-decoration-underline">Complaint Types</h3>
                        <div class="row d-flex">
                            <div class="form-group mb-3 col-md-5">
                                <h5 class="mt-2">Frequently Filed Complaint Types <span class="text-danger">*</span></h5>
                                <?php foreach ($complaintTitles as $title) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input complaint_type" type="radio" name="complaint_type" id="complaint_type_<?php echo $title['complaint_title']; ?>" value="<?php echo $title['id']; ?>">
                                        <label class="form-check-label" for="complaint_<?php echo $title['complaint_title']; ?>">
                                            <?php echo $title['complaint_title']; ?>
                                        </label>
                                    </div>
                                <?php }; ?>
                                <div id="complaint_types-error" class="text-danger"></div>
                            </div>

                            <div class="form-group mb-3 col-md-4">
                                <h5>Complaint Category <span class="text-danger">*</span> </h5>
                                <select class="form-select" id="complaint_category" name="complaint_category[]" onchange="validateForm()">
                                    <option value="0">choose:</option>
                                    <?php foreach ($complaint_categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name_of_complaint']; ?></option>
                                    <?php }; ?>
                                </select>
                                <div id="complaint_category-error" class="text-danger"></div>
                            </div>

                            <div class="form-group mb-3 col-md-3">
                                <h5>Complaint title <span class="text-danger">*</span> </h5>
                                <select class="form-select" id="complaint_title" name="complaint_title[]" onchange="validateForm()">
                                    <option value="0">choose:</option>
                                    <option value=""></option>
                                </select>
                                <div id="complaint_title-error" class="text-danger"></div>
                            </div>
                        </div>
                        <hr style="border-top: 3px solid #000;"> 
                        <div class=" mt-3 form-group mb-3">
                            <h5>Details of Complaint:</h5>
                            <textarea name="details" id="details_of_complaint" class="form-control" rows="5" onkeyup="validateForm()"></textarea>
                            <div id="details_of_complaint-error" class="text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <h5> <label for="Profilephoto" class="form-label">Upload Photograph/Video :</label></h5>
                            <input type="file" class="form-control" id="photo" name="imagefile" onchange="validateForm()">
                            <div id="photo-error" class="text-danger"></div>
                        </div>

                        <div class="d-grid">
                            <button type="button" class="btn btn-success" onclick="validateForm()">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#complaint_category').change(function() {
            var category_id = $(this).val();
            var selected_type = $('input[name="complaint_type"]:checked').val();
            $.ajax({
                url: '<?= base_url("getComplaintTitles") ?>',
                method: 'post',
                data: {
                    category_id: category_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#complaint_title').empty();
                    $('#complaint_title').append('<option value="0">choose:</option>');

                    $.each(response, function(index, data) {

                        if (data.id == selected_type) {
                            var selected = 'selected';
                        } else {
                            var selected = '';
                        }

                        $('#complaint_title').append('<option value="' + data.id + '" ' + selected + '>' + data.complaint_title + '</option>');
                        validateForm();
                    });
                }
            });
        });


        $('#area').change(function() {
            var area_id = $(this).val();
            $.ajax({
                url: '<?= base_url("getLocalities") ?>',
                method: 'post',
                data: {
                    area_id: area_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#Locality').empty();
                    $('#Locality').append('<option value="0">choose:</option>');
                    $.each(response, function(index, data) {
                        $('#Locality').append('<option value="' + data.id + '">' + data.name + '</option>');
                    });
                }
            });
        });

        $('#Locality').change(function() {
            var locality_id = $('#Locality').val();
            $.ajax({
                url: '<?= base_url("getStreets") ?>',
                method: 'post',
                data: {
                    locality_id: locality_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#street').empty();
                    $('#street').append('<option value="0">choose:</option>');
                    $.each(response, function(index, data) {
                        $('#street').append('<option value="' + data.id + '">' + data.name + '</option>');
                    });
                }
            });
        });


        $('.complaint_type').change(function() {

            var complaint_title = $(this).val();

            // $('#complaint_title').append('<option value="">choose:</option>');

            $.ajax({
                url: '<?= base_url("getComplaintTitlesByType") ?>',
                method: 'post',
                data: {
                    complaint_title: complaint_title
                },
                dataType: 'json',
                success: function(response) {

                    $('#complaint_category').val(response[0].complaint_category);

                    $("#complaint_category").trigger("change");

                    // $('#complaint_title').val(complaint_title);
                }
            });
        });

    });

    function validateForm() {
        var isValid = true;

        // Validate Mobile Number
        var mobile = $('#mobile').val();
        if (mobile.length !== 10 || isNaN(mobile)) {
            $('#mobile-error').text('Please enter a valid 10-digit mobile number.');
            isValid = false;
        } else {
            $('#mobile-error').text('');
        }

        // Validate Name
        var name = $('#name').val();
        if (name.trim().length < 3) {
            $('#name-error').text('Please enter your name.');
            isValid = false;
        } else {
            $('#name-error').text('');
        }

        // validate Gender
        var gender = $("input[name='gender']:checked").val();
        if (!gender) {
            $('#gender-error').text('Please select your gender.');
            isValid = false;
        } else {
            $('#gender-error').text('');
        }

        // validate Street Address
        var address = $('#address').val();
        if (address.trim().length < 3) {
            $('#address-error').text('Please enter your street address.');
            isValid = false;
        } else {
            $('#address-error').text('');
        }

        // Validate Pin Code
        var pinCode = $('#pin_code').val();
        if (pinCode.trim() === '' || isNaN(pinCode) || pinCode.length !== 6  || !pinCode.startsWith('6')) {
            $('#pin_code-error').text('Please enter a valid 6-digit pin code starting with 6.');
            isValid = false;
        } else {
            $('#pin_code-error').text('');
        }

        // Validate Landline
        var landline = $('#phone').val();
        if (landline.length !== 8 || isNaN(landline)) {
            $('#phone-error').text('Please enter a valid 8-digit landline number.');
            isValid = false;
        } else {
            $('#phone-error').text('');
        }

        // validate Email
        var email = $('#email').val();
        if (email.trim() === '' || !isValidEmail(email)) {
            $('#email-error').text('Please enter a valid email address.');
            isValid = false;
        } else {
            $('#email-error').text('');
        }

        // Validate Area
        var area = $('#area').val();
        if (area === '0') {
            $('#area-error').text('Please select an area.');
            isValid = false;
        } else {
            $('#area-error').text('');
        }

        // Validate Locality
        var locality = $('#Locality').val();
        if (locality === '0') {
            $('#locality-error').text('Please select a locality.');
            isValid = false;
        } else {
            $('#locality-error').text('');
        }

        // Validate Street
        var street = $('#street').val();
        if (street === '0') {
            $('#street-error').text('Please select a street.');
            isValid = false;
        } else {
            $('#street-error').text('');
        }

        // validate Specific Location
        var location = $('#location').val();
        if (location.trim() === '') {
            $('#location-error').text('Please enter a specific location.');
            isValid = false;
        } else {
            $('#location-error').text('');
        }


        // Validate Complaint Category
        var complaintCategory = $('#complaint_category').val();
        if (complaintCategory === '0') {
            $('#complaint_category-error').text('Please select a complaint category.');
            isValid = false;
        } else {
            $('#complaint_category-error').text('');
        }

        // validate Complaint Title
        var complaintTitle = $('#complaint_title').val();
        if (complaintTitle === '0') {
            $('#complaint_title-error').text('Please select a complaint title.');
            isValid = false;
        } else {
            $('#complaint_title-error').text('');
        }

        // Validate Details of Complaint
        var details = $('#details_of_complaint').val();
        if (details.trim().length < 4) {
            $('#details_of_complaint-error').text('Please provide details of the complaint.');
            isValid = false;
        } else {
            $('#details_of_complaint-error').text('');
        }

        // Validate File Upload
        var fileUpload = $('#photo').val();
        if (fileUpload.trim() === '') {
            $('#photo-error').text('Please upload a photograph or video.');
            isValid = false;
        } else {
            var ext = fileUpload.split('.').pop().toLowerCase();
            var fileSize = $('#photo')[0].files[0].size;
            var isValidFile = false;

            if (ext === 'mp4' && fileSize <= 50 * 1024 * 1024) {
                isValidFile = true;
            } else {
                var fileExtension = ['jpg', 'jpeg', 'png','pdf'];
                if ($.inArray(ext, fileExtension) !== -1 && fileSize <= 2 * 1024 * 1024) {
                    isValidFile = true;
                }
            }

            if (!isValidFile) {
                if (ext === 'mp4') {
                    $('#photo-error').text('Video should be in MP4 format and less than 50MB.');
                } else {
                    $('#photo-error').text('Only JPG, JPEG, and PNG formats are allowed and file size should be less than 2MB.');
                }
                isValid = false;
            } else {
                $('#photo-error').text('');
            }
        }

        //validate email 
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        if (isValid && event.target.tagName === 'BUTTON') {
            $('#myform').submit();
        }
    }
</script>

</html>