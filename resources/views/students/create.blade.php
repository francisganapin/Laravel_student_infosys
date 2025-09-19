<!DOCTYPE html>
<html>
    <script src="https://cdn.tailwindcss.com"></script>
</htmL>

<body class="bg-gray-100 p-6">

    <h1 class="text-xl font-bold mb-4">Add Student</h1>

    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3 bg-white p-4 rounded shadow">

        @csrf

        <input type="text" name="first_name" placeholder="First Name" class="border p-2 w-full">
        <input type="text" name="last_name"  placeholder="Last Name" class="border p-2 w-full">
        <input type="date" name="date_of_birth" class="border p-2 w-full">

        <select name="gender" class="border p-2 w-full">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
        <input type="text" name="place_number" placeholder="Phone Number" class="border p-2 w-full">
        <textarea name="address" placeholder="Address" class="border p-2 w-full"></textarea>
        <input type="date" name="enrollment_date" class="border p-2 w-full">
        <input type="file" name="photo" class="border p-2 w-full">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>


    </form>
</body>