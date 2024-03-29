<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="customerEmailUpdate">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="customerMobileUpdate">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="customerAddressUpdate">
                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-sm  btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/customer-by-id", {
            id: id
        })
        hideLoader();
        document.getElementById('customerNameUpdate').value = res.data['name'];
        document.getElementById('customerEmailUpdate').value = res.data['email'];
        document.getElementById('customerMobileUpdate').value = res.data['mobile'];
        document.getElementById('customerAddressUpdate').value = res.data['address'];
    }

    async function Update() {
        let customerName = document.getElementById('customerNameUpdate').value;
        let customerEmail = document.getElementById('customerEmailUpdate').value;
        let customerMobile = document.getElementById('customerMobileUpdate').value;
        let customerAddress = document.getElementById('customerAddressUpdate').value;
        let updateID = document.getElementById('updateID').value;


        if (customerName.length === 0) {
            errorToast("Customer Name is Required !")
        } else if (customerEmail.length === 0) {
            errorToast("Customer Email is Required !")
        } else if (customerMobile.length === 0) {
            errorToast("Customer Mobile Number is Required !")
        } else if (customerMobile.length > 11) {
            errorToast("Customer mobile number is too long !")
        } else if (customerAddress.length === 0) {
            errorToast("Customer Address Required !")
        } else {
            document.getElementById('update-modal-close').click();

            showLoader();
            let res = await axios.post("/update-customer", {
                name: customerName,
                email: customerEmail,
                mobile: customerMobile,
                address: customerAddress,
                id: updateID
            })
            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast('Customer Updated Successfully');
                document.getElementById("update-form").reset();
                await getList();
            } else {
                errorToast("Customer Update Failed !")
            }
        }
    }
</script>
