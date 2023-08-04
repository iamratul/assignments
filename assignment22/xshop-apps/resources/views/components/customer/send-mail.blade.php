<div class="modal" id="email-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
            </div>
            <div class="modal-body">
                <form id="send-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="customerEmail">
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
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Send()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Send() {
        let customerEmail = document.getElementById('customerEmail').value;
        let emailSubject = document.getElementById('emailSubject').value;
        let emailContent = document.getElementById('emailContent').value;
        let emailLink = document.getElementById('emailLink').value;
        let emailImage = document.getElementById('emailImage').value;

        if (customerEmail.length === 0) {
            errorToast("Customer Email is Required !")
        } else if (emailSubject.length === 0) {
            errorToast("Email Subject is Required !")
        } else if (emailContent.length > 11) {
            errorToast("Email Content is Required !")
        } else if (emailLink.length === 0) {
            errorToast("Redirect Link is Required !")
        } else if (emailImage.length === 0) {
            errorToast("Image Link is Required !")
        } else {
            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/send-promotional-mail", {
                email: customerEmail,
                mailSubject: emailSubject,
                mailImage: emailContent,
                mailContent: emailLink,
                mailLink: emailImage
            })
            hideLoader();

            if (res.status === 200) {
                successToast('Promotional emails sent successfully');
                document.getElementById("send-form").reset();
            } else {
                errorToast("Email not sent !")
            }
        }
    }
</script>