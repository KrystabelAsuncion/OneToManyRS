<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject create</title>
</head>
<body>
    <h1>Add Subject</h1>
    <form action="{{ route('subjects.store') }}" method="post">
        @csrf
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" required>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <select id="student_id" name="student_id" required>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
