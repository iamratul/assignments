<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 animated fadeIn col-lg-4 center-screen">
            <div class="card w-90 p-4 shadow">
                <div class="card-body">
                    <img class="login-page-img d-flex mx-auto mb-3" src="{{ asset('images/user.webp') }}" alt="" />
                    <h4 class="text-center text-uppercase fw-normal">User Login</h4>
                    <br />
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                    <br />
                    <button onclick="SubmitLogin()" class="w-100 btn btn-success">Sign In</button>
                    <hr />
                    <div class="p-2">
                        <span>Don't Have a Account?</span>
                    </div>
                    <div class="mt-3">
                        <span>
                            <a class="btn btn-primary w-100" href="{{ url('/registration') }}">Sign Up </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            //     showLoader();
            //     let res = await axios.post("/user-login", {
            //         email: email,
            //         password: password
            //     });
            //     hideLoader();
            //     if (res.status === 200 && res.data['status'] === 'success') {
            //         successToast(res.data['message']);
            //         setTimeout(() => {
            //             window.location.href = "/employee/dashboard";
            //         }, 1500);
            //     } else {
            //         errorToast(res.data['message']);
            //     }
            // }
            showLoader();
            try {
                let res = await axios.post("/user-login", { // Update the URL to your login endpoint
                    email: email,
                    password: password
                });
                hideLoader();
                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast(res.data['message']);
                    setTimeout(() => {
                        // Redirect to the appropriate dashboard based on user role
                        if (res.data['role'] === 'employee') {
                            window.location.href = "/employee/dashboard";
                        } else if (res.data['role'] === 'admin') {
                            window.location.href = "/admin/dashboard";
                        }
                    }, 1500);
                } else {
                    errorToast(res.data['message']);
                }
            } catch (error) {
                hideLoader();
                errorToast("An error occurred during login.");
            }
        }
    }
</script>
