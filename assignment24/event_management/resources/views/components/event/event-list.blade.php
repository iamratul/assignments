<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5 shadow">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Events</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                            class="float-end m-0 btn btn-primary">Create Event</button>
                    </div>
                </div>
                <hr class="bg-dark " />

                <!-- Add filter and sort options -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="filterCategory" class="form-label">Filter by Category</label>
                        <select id="filterCategory" class="form-select">
                            <option value="">Select</option>
                            <!-- Populate options dynamically using JavaScript -->
                        </select>
                    </div>
                </div>

                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>SL No</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Total Seat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Attach event listeners to filter and sort options
    $('#filterCategory').change(getList);

    FillCategoryDropDown();
    async function FillCategoryDropDown() {
        let res = await axios.get("/event-category-list")
        res.data.forEach(function(item, i) {
            let option = `<option value="${item['id']}">${item['name']}</option>`
            $("#filterCategory").append(option);
        })
    }

    getList();

    async function getList() {
        const filterCategory = $('#filterCategory').val();

        if (filterCategory === "") {
            // Show all income data by default
            showLoader();
            let res = await axios.get("/event-list");
            hideLoader();
            await updateTableData(res.data);
        } else {
            // General filtering
            showLoader();
            let res = await axios.get("/event-list", {
                params: {
                    category: filterCategory
                }
            });
            hideLoader();
            await updateTableData(res.data);
        }
    }

    async function updateTableData(data) {
        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        data.forEach(async function(item, index) {
            const formattedDate = new Date(item['date']).toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${item['category']['name']}</td>
                    <td>${item['title']}</td>
                    <td>${formattedDate}</td>
                    <td>${item['time']}</td>
                    <td>${item['location']}</td>
                    <td>${item['seat']}</td>
                    <td>
                        <button data-id="${item['id']}" class="viewBtn btn btn-sm btn-outline-success">View</button>
                        <button data-id="${item['id']}" class="editBtn btn btn-sm btn-outline-primary">Edit</button>
                        <button data-id="${item['id']}" class="deleteBtn btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`;
            tableList.append(row);
        });

        $('.viewBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpViewForm(id);
            $("#view-modal").modal('show');
        });

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        });

        new DataTable('#tableData', {
            lengthMenu: [5, 10, 15, 20, 30]
        });
    }
</script>
