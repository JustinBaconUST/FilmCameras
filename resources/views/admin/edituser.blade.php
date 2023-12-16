<!-- resources/views/admin/category/edituser.blade.php -->

<html>
<head>
    <title>Edit User</title>

    <!-- Include any necessary styles or scripts here -->
</head>
<body>
    @include('adminheader')
    </header>

    <main>
        <section>
            <h1>Edit User</h1>
            <form method="post" action="{{ route('update-user', ['id' => $user->id]) }}">
                @csrf
                @method('put')
                <label for="fName">First Name:</label>
                <input type="text" id="fName" name="fName" value="{{ $user->fName }}" required>

                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lName" value="{{ $user->lName }}" required>

                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="{{ $user->phoneNumber }}" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>

                <button type="submit">Update User</button>
            </form>
        </section>
    </main>
</body>
</html>