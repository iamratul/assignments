<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event Category</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Event Category Name *</label>
                                <input type="text" placeholder="Enter Category Name" class="form-control" id="eventCategoryName">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function Save() {
        let eventCategoryName = document.getElementById('eventCategoryName').value;

        if (eventCategoryName.length === 0) {
            errorToast("Category Required !")
        }
        else {
            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-event-category",{name:eventCategoryName})
            hideLoader();

            if(res.status===201){

                successToast('Category Created Successfully');

                document.getElementById("save-form").reset();

                await getList();
            }
            else{
                errorToast("Category Create Failed !")
            }
        }
    }
</script>