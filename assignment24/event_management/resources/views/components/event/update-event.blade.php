<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Income</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="updateEventCategory">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="updateEventTitle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <label class="form-label">Description</label>
                                <textarea rows="8" class="form-control" id="updateEventDescription"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="updateEventDate">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Time</label>
                                <input type="time" class="form-control" id="updateEventTime" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" id="updateEventLocation">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Seat</label>
                                <input type="number" class="form-control" id="updateEventSeat">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 p-1">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" id="updateEventPrice">
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="updateEventImage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <img id="oldImg" src="{{ asset('images/default.jpg') }}" width="100" />
                            </div>
                        </div>
                        <input type="text" class="d-none" id="updateID">
                        <input type="text" class="d-none" id="filePath">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn btn-sm btn-success">Update</button>
            </div>

        </div>
    </div>
</div>

<script>
    async function UpdateFillCategoryDropDown() {
        let res = await axios.get("/event-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#updateEventCategory").append(option);
        })
    }

    async function FillUpUpdateForm(id, filePath) {
        document.getElementById('updateID').value = id;
        document.getElementById('filePath').value = filePath;
        document.getElementById('oldImg').src = filePath;

        showLoader();
        await UpdateFillCategoryDropDown();
        let res = await axios.post("/event-by-id", {
            id: id
        })
        hideLoader();

        document.getElementById('updateEventTitle').value = res.data['title'];
        document.getElementById('updateEventDescription').value = res.data['description'];
        document.getElementById('updateEventDate').value = res.data['date'];
        document.getElementById('updateEventTime').value = res.data['time'];
        document.getElementById('updateEventLocation').value = res.data['location'];
        document.getElementById('updateEventSeat').value = res.data['seat'];
        document.getElementById('updateEventPrice').value = res.data['price'];
        document.getElementById('updateEventCategory').value = res.data['category_id'];
    }

    async function update() {

        let updateEventCategory = document.getElementById('updateEventCategory').value;
        let updateEventTitle = document.getElementById('updateEventTitle').value;
        let updateEventDescription = document.getElementById('updateEventDescription').value;
        let updateEventDate = document.getElementById('updateEventDate').value;
        let updateEventTime = document.getElementById('updateEventTime').value;
        let updateEventLocation = document.getElementById('updateEventLocation').value;
        let updateEventSeat = document.getElementById('updateEventSeat').value;
        let updateEventPrice = document.getElementById('updateEventPrice').value;
        let updateID = document.getElementById('updateID').value;
        let filePath = document.getElementById('filePath').value;
        let updateEventImage = document.getElementById('updateEventImage').files[0];

        if (updateEventCategory.length === 0) {
            errorToast("Event Category is Required !")
        } else if (updateEventTitle.length === 0) {
            errorToast("Event Title is Required !")
        } else if (updateEventDescription.length === 0) {
            errorToast("Event Description is Required !")
        } else if (updateEventDate.length === 0) {
            errorToast("Event Date is Required !")
        } else if (updateEventTime.length === 0) {
            errorToast("Event Time is Required !")
        } else if (updateEventLocation.length === 0) {
            errorToast("Event Location is Required !")
        } else if (updateEventSeat.length === 0) {
            errorToast("Event Seat is Required !")
        } else if (updateEventPrice.length === 0) {
            errorToast("Event Price is Required !")
        } else {
            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('category_id', updateEventCategory);
            formData.append('title', updateEventTitle);
            formData.append('description', updateEventDescription);
            formData.append('date', updateEventDate);
            formData.append('time', updateEventTime);
            formData.append('location', updateEventLocation);
            formData.append('seat', updateEventSeat);
            formData.append('price', updateEventPrice);
            formData.append('image', updateEventImage);
            formData.append('id', updateID);
            formData.append('file_path', filePath);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            showLoader();
            let res = await axios.post("/update-event", formData, config);
            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast('Event Updated Successfully');
                document.getElementById("update-form").reset();
                await getList();
            } else {
                errorToast("Event Not Updated !")
            }
        }
    }
</script>