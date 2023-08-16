<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="eventCategory">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="eventTitle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Description</label>
                                {{-- <input type="text" class="form-control" id="eventDescription"> --}}
                                <textarea rows="8" class="form-control" id="eventDescription"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDate">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Time</label>
                                <input type="time" class="form-control" id="eventTime" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" id="eventLocation">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Seat</label>
                                <input type="number" class="form-control" id="eventSeat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" id="eventPrice">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="eventImage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <img id="newImg" src="{{ asset('images/default.jpg') }}" width="100" />
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
        let res = await axios.get("/event-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#eventCategory").append(option);
        })
    }

    async function Save() {

        let eventCategory = document.getElementById('eventCategory').value;
        let eventTitle = document.getElementById('eventTitle').value;
        let eventDescription = document.getElementById('eventDescription').value;
        let eventDate = document.getElementById('eventDate').value;
        let eventTime = document.getElementById('eventTime').value;
        let eventLocation = document.getElementById('eventLocation').value;
        let eventSeat = document.getElementById('eventSeat').value;
        let eventPrice = document.getElementById('eventPrice').value;
        let eventImage = document.getElementById('eventImage').files[0];

        if (eventCategory.length === 0) {
            errorToast("Event Category is Required !")
        } else if (eventTitle.length === 0) {
            errorToast("Event Title is Required !")
        } else if (eventDescription.length === 0) {
            errorToast("Event Description is Required !")
        } else if (eventDate.length === 0) {
            errorToast("Event Date is Required !")
        } else if (eventTime.length === 0) {
            errorToast("Event Time is Required !")
        } else if (eventLocation.length === 0) {
            errorToast("Event Location is Required !")
        } else if (eventSeat.length === 0) {
            errorToast("Event Seat is Required !")
        } else if (eventPrice.length === 0) {
            errorToast("Event Price is Required !")
        } else if (!eventImage) {
            errorToast("Event Image is Required!")
        } else {
            document.getElementById('modal-close').click();

            let formData = new FormData();
            formData.append('category_id', eventCategory);
            formData.append('title', eventTitle);
            formData.append('description', eventDescription);
            formData.append('date', eventDate);
            formData.append('time', eventTime);
            formData.append('location', eventLocation);
            formData.append('seat', eventSeat);
            formData.append('price', eventPrice);
            formData.append('image', eventImage);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            showLoader();
            let res = await axios.post("/create-event", formData, config);
            hideLoader();

            if (res.status === 201 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
