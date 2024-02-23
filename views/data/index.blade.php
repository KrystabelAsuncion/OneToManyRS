<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
</head>
<body>
    <h1>Students</h1>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student->name }}</li>
            <ul>
                @foreach ($student->subjects as $subject)
                    <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>

    <h1>Subjects</h1>
    <ul>
        @foreach ($subjects as $subject)
            <li>{{ $subject->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('students.create') }}">Add Student</a>
    <a href="{{ route('subjects.create') }}">Add Subject</a>
</body>
</html>
