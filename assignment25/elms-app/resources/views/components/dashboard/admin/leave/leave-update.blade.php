<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Leave</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="leaveCategoryUpdate">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-1">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDateUpdate">
                            </div>
                            <div class="col-md-12 p-1">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDateUpdate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Description</label>
                                <textarea rows="8" class="form-control" id="leaveReasonUpdate"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Status</label>
                                <select type="text" class="form-control form-select" id="leaveStatusUpdate">
                                    <option value="">Select Status</option>
                                </select>
                            </div>
                        </div>
                        <input type="text" class="d-none" id="updateID">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="update()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function UpdateFillCategoryDropDown() {
        let res = await axios.get("/admin/leave-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#leaveCategoryUpdate").append(option);
        })
    }

    async function UpdateFillStatusDropdown() {
        let statusEnum = ['pending', 'approved', 'rejected'];

        statusEnum.forEach(function(value) {
            let option =
                `<option value="${value}">${value.charAt(0).toUpperCase() + value.slice(1)}</option>`;
            $("#leaveStatusUpdate").append(option);
        });
    }

    async function FillUpUpdateForm(id) {
        document.getElementById('updateID').value = id;
        showLoader();
        await UpdateFillCategoryDropDown();
        await UpdateFillStatusDropdown();
        let res = await axios.post("/leave-request-by-id", {
            id: id
        })
        hideLoader();

        document.getElementById('startDateUpdate').value = res.data['start_date'];
        document.getElementById('endDateUpdate').value = res.data['end_date'];
        document.getElementById('leaveReasonUpdate').value = res.data['reason'];
        document.getElementById('leaveCategoryUpdate').value = res.data['leave_category_id'];
        document.getElementById('leaveStatusUpdate').value = res.data['status'];
    }

    async function update() {

        let leaveCategoryUpdate = document.getElementById('leaveCategoryUpdate').value;
        let startDateUpdate = document.getElementById('startDateUpdate').value;
        let endDateUpdate = document.getElementById('endDateUpdate').value;
        let leaveReasonUpdate = document.getElementById('leaveReasonUpdate').value;
        let leaveStatusUpdate = document.getElementById('leaveStatusUpdate').value;
        let updateID = document.getElementById('updateID').value;

        if (leaveCategoryUpdate.length === 0) {
            errorToast("Leave Category is Required !")
        } else if (startDateUpdate.length === 0) {
            errorToast("Start Date is Required !")
        } else if (endDateUpdate.length === 0) {
            errorToast("End Date is Required !")
        } else if (leaveReasonUpdate.length === 0) {
            errorToast("Leave Reason is Required !")
        }  else if (leaveStatusUpdate.length === 0) {
            errorToast("Leave Status is Required !")
        } else {
            document.getElementById('update-modal-close').click();

            showLoader();
            let res = await axios.post("/admin/update-leave-request", {
                leave_category_id: leaveCategoryUpdate,
                start_date: startDateUpdate,
                end_date: endDateUpdate,
                reason: leaveReasonUpdate,
                status: leaveStatusUpdate,
                id: updateID
            })
            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast('Leave Request Updated Successfully');
                document.getElementById("update-form").reset();
                await getList();
            } else {
                errorToast("Leave Request Not Updated !")
            }
        }
    }
</script>
