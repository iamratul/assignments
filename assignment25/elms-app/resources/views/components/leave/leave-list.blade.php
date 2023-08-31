<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5 shadow">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Leave Request</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                            class="float-end m-0 btn btn-primary">Create Leave</button>
                    </div>
                </div>
                <hr class="bg-dark " />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Leave Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
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
    getList();

    async function getList() {

        showLoader();
        let res = await axios.get("/employee/leave-request-list");
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(item, index) {
            const startDate = new Date(item['start_date']).toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            const endDate = new Date(item['end_date']).toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            let row = `<tr>
                    <td>${index+1}</td>
                    <td>${item['category']['name']}</td>
                    <td>${startDate}</td>
                    <td>${endDate}</td>
                    <td>${item['reason']}</td>
                    <td>${item['status']}</td>
                 </tr>`
            tableList.append(row)
        })

        new DataTable('#tableData', {
            lengthMenu: [5, 10, 15, 20, 30]
        });
    }
</script>
