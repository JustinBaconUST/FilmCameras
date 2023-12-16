<html>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <meta charset="utf-8">
    <title>Manage Orders</title>
</head>

<body>
    @include('adminheader')

    <section class="tablebg">
        <h1 class="prodh1">Manage Orders</h1>
        <div class="table-search">
            <input type="text" id="searchInput" placeholder="Search...">
        </div>
        <div class="limiter">
            <div class="container-table100">
                <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">Date</th>
                                <th class="column2">Order ID</th>
                                <th class="column3">Name</th>
                                <th class="column4">Price</th>
                                <th class="column5">Quantity</th>
                                <th class="column6">Total</th>
                                <th class="column7">Status</th>
                                <th class="column8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="column1">2023-08-22</td>
                                <td class="column2">2</td>
                                <td class="column3">CANON AE-1 [35mm SLR]</td>
                                <td class="column4">Php 5,499</td>
                                <td class="column5">1</td>
                                <td class="column6">Php 5,499</td>
                                <td class="column7">Pending</td>
                                <td class="column8">
                                    <button class="btn btn-success">Fulfilled</button>
                                    <button class="btn btn-danger">Cancel</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("searchInput").addEventListener("input", function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll(".table100 tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
