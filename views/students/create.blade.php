<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="card p-4">
            <h1 class="mx-auto">Add Student</h1>
            <form action="{{ route('students.store') }}" method="POST" class="mx-auto" style="width: 500px;">
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="course">Course:</label>
                    <input type="text" id="course" name="course" class="form-control" required>
                </div>

                <div class="mb-3" id="subjects-container">
                    <label for="subjects">Subjects:</label>
                    <div class="subject-fields">
                        <div class="subject-field">
                            <input type="text" name="subjects[0][code]" class="form-control mb-2" placeholder="Code" >
                            <input type="text" name="subjects[0][title]" class="form-control mb-2" placeholder="Title" >
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-warning " type="button" id="add-subject">Add Subject</button>
                </div>


                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-dark" href="{{route('dashboard')}}">Back to Home</a>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#add-subject").click(function() {
                var index = $(".subject-field").length; // Get the current number of subject fields
                var html = `
                    <div class="subject-field">
                        <input type="text" name="subjects[${index}][code]" class="form-control mb-2" placeholder="Code" required>
                        <input type="text" name="subjects[${index}][title]" class="form-control mb-2" placeholder="Title" required>
                    </div>`;
                $(".subject-fields").append(html);
            });
        });
    </script>
</body>
</html>
