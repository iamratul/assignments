<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Leave</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="leaveCategory">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-1">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="col-md-12 p-1">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Description</label>
                                <textarea rows="8" class="form-control" id="leaveReason"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    FillCategoryDropDown();

    async function FillCategoryDropDown() {
        let res = await axios.get("/admin/leave-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#leaveCategory").append(option);
        })
    }

    async function Save() {
        let leaveCategory = document.getElementById('leaveCategory').value;
        let startDate = document.getElementById('startDate').value;
        let endDate = document.getElementById('endDate').value;
        let leaveReason = document.getElementById('leaveReason').value;

        if (leaveCategory.length === 0) {
            errorToast("Leave Category is Required !")
        } else if (startDate.length === 0) {
            errorToast("Leave Start Date is Required !")
        } else if (endDate.length === 0) {
            errorToast("Leave End Date is Required !")
        } else if (leaveReason.length === 0) {
            errorToast("Leave Reason is Required !")
        } else {
            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/employee/create-leave-request", {
                leave_category_id: leaveCategory,
                start_date: startDate,
                end_date: endDate,
                reason: leaveReason
            });
            hideLoader();

            if (res.status === 201) {
                successToast('Leave request created successfully');
                document.getElementById('save-form').reset();
                await getList();
            } else {
                errorToast('Leave request not created');
            }
        }
    }
</script>
