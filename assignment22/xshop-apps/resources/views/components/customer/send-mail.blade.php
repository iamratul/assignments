<div class="modal" id="email-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sent Promotional Email</h5>
            </div>
            <div class="modal-body">
                <form id="email-send-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email">
                                <label class="form-label">Subject *</label>
                                <input type="text" class="form-control" id="emailSubject">
                                <label class="form-label">Content *</label>
                                <input type="text" class="form-control" id="emailContent">
                                <label class="form-label">Redirect Link *</label>
                                <input type="text" class="form-control" id="emailLink">
                                <label class="form-label">Image Link *</label>
                                <input type="text" class="form-control" id="emailImage">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="email-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="SendEmail()" id="email-send-btn" class="btn btn-sm  btn-success">Send</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function SendEmail() {
        let customerEmail = document.getElementById('email').value;
        let emailSubject = document.getElementById('emailSubject').value;
        let emailImage = document.getElementById('emailImage').value;
        let emailContent = document.getElementById('emailContent').value;
        let emailLink = document.getElementById('emailLink').value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (customerEmail.length === 0) {
            errorToast("Customer Email is Required !");
        } else if (!emailRegex.test(customerEmail)) {
            errorToast("Invalid Email Address !");
        } else if (emailSubject.length === 0) {
            errorToast("Email Subject is Required !");
        } else if (emailImage.length === 0) {
            errorToast("Image Link is Required !");
        } else if (emailContent.length === 0) {
            errorToast("Email Content is Required !");
        } else if (emailLink.length === 0) {
            errorToast("Redirect Link is Required !");
        } else {
            document.getElementById('email-modal-close').click();

            showLoader();
            let res = await axios.post("/send-promotional-mail", {
                email: customerEmail,
                mailSubject: emailSubject,
                mailImage: emailImage,
                mailContent: emailContent,
                mailLink: emailLink
            })
            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                document.getElementById("email-send-form").reset();
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>
