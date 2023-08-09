<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4 class="text-center">User Login</h4>
                    <br />
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                    <br />
                    <button onclick="SubmitLogin()" class="w-100 btn btn-success">Sign In</button>
                    <hr />
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
            showLoader();
            let res = await axios.post("/user-login", {
                email: email,
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/dashboard";
                }, 1500);
            } else {
                errorToast(res.data['message']);
            }
        }
    }
</script>