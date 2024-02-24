<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    label{
        font-weight: bold;
    }
</style>
<body>
    <div class="container d-flex justify-content-center">
        <div class="card p-4">
            <h1 class="mx-auto">Add Subject</h1>
            <form action="{{ route('subjects.store') }}" method="POST" class="mx-auto" style="width: 500px;">
                @csrf
                <div class="mb-3">
                    <label for="code">Code:</label>
                    <input type="text" id="code" name="code" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <label for="student_id">Student Id</label>
                <select id="student_id" name="student_id" class="form-select mb-3" required>
                    <option  selected>Select Student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>

                <button class="btn btn-success" type="submit">Submit</button>

            </form>
        </div>
    </div>
</body>
</html>
