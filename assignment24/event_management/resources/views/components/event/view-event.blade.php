<div class="modal" id="view-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1 overflow-hidden">
                            <label class="form-label">Event Image</label>
                            <img src="" alt="" id="vieweventImage" class="img-fluid" />
                            <label class="form-label">Category</label>
                            <select type="text" class="form-control form-select" id="viewCategoryUpdate" disabled>
                                <option value="">Select Category</option>
                            </select>
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" id="vieweventTitle" readonly>
                            <label class="form-label">Description</label>
                            {{-- <input type="text" class="form-control" id="vieweventDescription" readonly> --}}
                            <textarea rows="8" class="form-control" id="vieweventDescription" readonly></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-1">
                            <label class="form-label">Date</label>
                            <input type="text" class="form-control" id="vieweventDate" readonly>
                        </div>
                        <div class="col-md-6 p-1">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control" id="vieweventTime" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-1">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="vieweventLocation" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-1">
                            <label class="form-label">Seat</label>
                            <input type="text" class="form-control" id="vieweventSeat" readonly>
                        </div>
                        <div class="col-md-6 p-1">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="vieweventPrice" readonly>
                        </div>
                    </div>
                    <input type="text" class="d-none" id="viewID">
                </div>
            </div>

            <div class="modal-footer">
                <button id="view-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function ViewFillCategoryDropDown() {
        let res = await axios.get("/event-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#viewCategoryUpdate").append(option);
        })
    }

    async function FillUpViewForm(id) {
        document.getElementById('viewID').value = id;
        showLoader();
        await ViewFillCategoryDropDown();
        let res = await axios.post("/event-by-id", {
            id: id
        })
        hideLoader();
        const dateParts = res.data['date'].split('-');
        const year = dateParts[0];
        const month = dateParts[1];
        const day = dateParts[2];
        const viewFormattedDate = `${day}/${month}/${year}`;

        document.getElementById('vieweventTitle').value = res.data['title'];
        document.getElementById('vieweventDescription').value = res.data['description'];
        document.getElementById('vieweventDate').value = viewFormattedDate;
        document.getElementById('vieweventTime').value = res.data['time'];
        document.getElementById('vieweventLocation').value = res.data['location'];
        document.getElementById('vieweventSeat').value = res.data['seat'];
        document.getElementById('vieweventPrice').value = res.data['price'];
        document.getElementById('vieweventImage').src = res.data['image'];
        document.getElementById('viewCategoryUpdate').value = res.data['category_id'];
    }
</script>
