<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <div class="container w-15 p-4 my-5 border">
                    <h2 class="text-black text-center text-decoration-underline">Admin Login</h2>
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('error') ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('submit_form') ?>" method="post" onsubmit="return validateForm()">
                        <div class="form-group mb-3 mt-4">
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" onkeyup="validateForm()">
                            <div id="email-error" class="text-danger"></div>
                        </div><br>
                        <div class="form-group mb-3">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" onkeyup="validateForm()">
                            <div id="password-error" class="text-danger"></div>
                        </div><br>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function validateForm() {
        var isValid = true;
        // Validate Email
        var email = $('#email').val();
        if (email.trim() === '' || !isValidEmail(email)) {
            $('#email-error').text('Please enter a valid email address.');
            isValid = false;
        } else {
            $('#email-error').text('');
        }
        // Validate Password
        var password = $('#password').val();
        if (password.trim() === '') {
            $('#password-error').text('Please enter a password.');
            isValid = false;
        } else {
            $('#password-error').text('');
        }
        return isValid;
    }

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>

</html>
