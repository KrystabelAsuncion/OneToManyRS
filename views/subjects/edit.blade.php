<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject Edit</title>
</head>
<body>
    <h1>Edit Subject</h1>
    <form action="{{ route('subjects.update', $subject->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" value="{{ $subject->code }}" required>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $subject->title }}" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
