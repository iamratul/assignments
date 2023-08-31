<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-4 center-screen">
            <div class="card animated fadeIn w-100 p-3 shadow">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr />
                    {{-- <div class="container-fluid m-0 p-0"> --}}
                    <div class="row m-0 p-0">
                        <div class="col-md-12 p-2">
                            <label>Full Name</label>
                            <input id="fullName" placeholder="Full Name" class="form-control" type="text" />
                        </div>
                        <div class="col-md-12 p-2">
                            <label>Email Address</label>
                            <input id="email" placeholder="User Email" class="form-control" type="email" />
                        </div>
                        <div class="col-md-12 p-2">
                            <label>Mobile Number</label>
                            <input id="mobile" placeholder="Mobile" class="form-control" type="mobile" />
                        </div>
                        <div class="col-md-12 p-2">
                            <label>Password</label>
                            <input id="password" placeholder="User Password" class="form-control" type="password" />
                        </div>
                        <div class="col-md-12 p-2">
                            <label>Confirm Password</label>
                            <input id="password_confirmation" placeholder="Confirm Password" class="form-control"
                                type="password" />
                        </div>
                    </div>
                    <div class="row mt-3 m-0 p-0">
                        <div class="col-md-12 p-2">
                            <button onclick="onRegistration()" class="w-100 btn btn-success">Register</button>
                        </div>
                        <div class="col-md-12 p-2">
                            <span>Have a Account?</span>
                        </div>
                        <div class="col-md-12 p-2">
                            <a class="text-center w-100 btn btn-primary" href="{{ url('/login') }}">Sign In</a>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function onRegistration() {

        let fullName = document.getElementById('fullName').value;
        let email = document.getElementById('email').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;
        let cPassword = document.getElementById('password_confirmation').value;

        if (fullName.length === 0) {
            errorToast('Full Name is required')
        } else if (email.length === 0) {
            errorToast('Email is required')
        } else if (mobile.length === 0) {
            errorToast('Mobile is required')
        } else if (password.length === 0) {
            errorToast('Password is required')
        } else if (password !== cPassword) {
            errorToast('Password does not match')
        } else {
            showLoader();
            let res = await axios.post("/user-registration", {
                fullName: fullName,
                email: email,
                mobile: mobile,
                password: password
            })
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = '/login'
                }, 2000)
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
