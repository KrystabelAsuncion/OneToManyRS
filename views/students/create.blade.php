<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students create</title>
</head>
<body>

    <h1>Add Student</h1>
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>


        <button type="submit">Submit</button>
    </form>

</body>
</html>
