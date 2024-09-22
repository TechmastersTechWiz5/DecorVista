<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from techzaa.getappui.com/larkon/admin/auth-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2024 00:52:52 GMT -->
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Reset Password | Larkon - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset('public/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toastify CSS for notifications -->
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">

    <!-- Theme Config js (Require in all Page) -->
    <script src="{{ asset('public/assets/js/config.js') }}"></script>
</head>

<body class="h-100">

     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-6 py-lg-5">
                                   <div class="d-flex flex-column h-100 justify-content-center">
                                        <h2 class="fw-bold fs-24">Reset Password</h2>

                                        <p class="text-muted mt-1 mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>

                                        <div>
                                             <form class="authentication-form">
                                                  <div class="mb-3">
                                                       <label class="form-label" for="example-email">Email</label>
                                                       <input type="email" id="example-email" name="email" class="form-control" placeholder="Enter your email">
                                                  </div>
                                                  <div class="mb-1 text-center d-grid">
                                                       <button class="btn btn-primary" type="submit">Reset Password</button>
                                                  </div>
                                             </form>
                                        </div>

                                        <p class="mt-5 text-danger text-center">Back to<a href="{{route('login-verification')}}" class="text-dark fw-bold ms-1">Sign In</a></p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-xxl-5 d-none d-xxl-flex">
                         <div class="card h-100 mb-0 overflow-hidden">
                              <div class="d-flex flex-column h-100">
                                   <img src="assets/images/small/img-10.jpg" alt="" class="w-100 h-100">
                              </div>
                         </div> <!-- end card -->
                    </div>
               </div>
          </div>
     </div>

    <!-- jQuery (necessary for AJAX requests) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="{{ asset('public/assets/js/vendor.js') }}"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="{{ asset('public/assets/js/app.js') }}"></script>

    <!-- Toastify JS for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

            <!-- jQuery Cdn -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- jQuery Cdn -->

    <script>
        function handleLoginForm(formMethod, formId, btnId, targetUrl, redirectUrl, timer = 3000) {
            $(btnId).prop("disabled", true);
            $(btnId).html('<span class="spinner-border spinner-border-sm"></span> Processing...');

            const formData = $(formId).serialize();

            $.ajax({
                url: targetUrl,
                type: formMethod,
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    var response = JSON.parse(JSON.stringify(data));
                    if (response.status === "success") {
                        Toastify({
                            text: response.message,
                            duration: timer,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();

                        setTimeout(() => {
                            location.replace(redirectUrl);
                        }, timer);
                    } else if (response.status === "warning" || response.status === "error") {
                        Toastify({
                            text: response.message,
                            duration: timer,
                            gravity: "top",
                            position: 'right',
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        }).showToast();

                        $(btnId).prop("disabled", false);
                        $(btnId).html("Sign In");
                    }
                },
                error: function(jqXHR) {
                    Toastify({
                        text: "An error occurred. Please try again later.",
                        duration: timer,
                        gravity: "top",
                        position: 'right',
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                    }).showToast();

                    $(btnId).prop("disabled", false);
                    $(btnId).html("Sign In");
                },
            });
        }

        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();  // Prevent the default form submission
                handleLoginForm('POST', '#loginForm', '#btnSubmit', '{{ route('login.verification') }}','{{ route('dashboard') }}');
            });
        });
    </script>

</body>


<!-- Mirrored from techzaa.getappui.com/larkon/admin/auth-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2024 00:52:53 GMT -->
</html>