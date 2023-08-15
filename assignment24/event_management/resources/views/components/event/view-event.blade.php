<div class="modal" id="view-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1 overflow-hidden">
                                <label class="form-label">Event Image</label>
                                <img src="" alt="" id="eventImage" class="img-fluid" />
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="viewCategoryUpdate">
                                    <option value="">Select Category</option>
                                </select>

                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="eventTitle" readonly>
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="eventDescription" readonly>
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDate" readonly>
                                <label class="form-label">Time</label>
                                <input type="time" class="form-control" id="eventTime" readonly>
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" id="eventLocation" readonly>
                                <label class="form-label">Seat</label>
                                <input type="text" class="form-control" id="eventSeat" readonly>
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" id="eventPrice" readonly>

                                <input type="text" class="d-none" id="viewID">
                            </div>
                        </div>
                    </div>
                </form>
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

        document.getElementById('eventTitle').value = res.data['title'];
        document.getElementById('eventDescription').value = res.data['description'];
        document.getElementById('eventDate').value = res.data['date'];
        document.getElementById('eventTime').value = res.data['time'];
        document.getElementById('eventLocation').value = res.data['location'];
        document.getElementById('eventSeat').value = res.data['seat'];
        document.getElementById('eventPrice').value = res.data['price'];
        document.getElementById('eventImage').src = res.data['image'];
        document.getElementById('viewCategoryUpdate').value = res.data['category_id'];
    }
</script>