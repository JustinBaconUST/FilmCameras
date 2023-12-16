<!-- resources/views/admin/category/manageusers.blade.php -->

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <title>Manage Users</title>
    <style>
        .hidden {
            display: none;
        }
        .c1 { width: 10%; }
        .c2 { width: 15%; }
        .c3 { width: 15%; }
        .c4 { width: 15%; }
        .c5 { width: 15%; }
        .c6 { width: 15%; }
        .c7 { width: 15%; }
    </style>
</head>
<body>
    @include('adminheader')
    </header>   
    <main>
        <section class="usertablebg">
            <h1 class="prodh1">Manage Users</h1>
            <div class="table-search">
                <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchTable()">
            </div>
            <div class="limiter">
                <div class="container-table100">
                    <div class="table100">
                        <table id="userTable">
                            <thead>
                                <tr class="table100-head">
                                    <th class="c1">Type</th>
                                    <th class="c2">First Name</th>
                                    <th class="c3">Last Name</th>
                                    <th class="c4">Phone Number</th>
                                    <th class="c5">Username</th>
                                    <th class="c6">Email</th>
                                    <th class="c7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="c1">{{ $user->type }}</td>
                                        <td class="c2">{{ $user->fName }}</td>
                                        <td class="c3">{{ $user->lName }}</td>
                                        <td class="c4">{{ $user->phoneNumber }}</td>
                                        <td class="c5">{{ $user->username }}</td>
                                        <td class="c6">{{ $user->email }}</td>
                                        <td class="c7">
                                            @if ($user->type !== 'admin')
                                                <a href="{{ route('edit-user', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                                                <form method="post" action="{{ route('delete-user', ['id' => $user->id]) }}" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @else
                                                <!-- Disable buttons for admin -->
                                                <button class="btn btn-warning" disabled>Edit</button>
                                                <button class="btn btn-danger" disabled>Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function searchTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("userTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.remove("hidden");
                            break; // Break the inner loop if a match is found
                        } else {
                            tr[i].classList.add("hidden");
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>
