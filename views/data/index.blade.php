<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body
    {
        font-size: 20px;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="display-1 text-center my-5">ONE TO MANY RS</div>
        <div class="row border">
            <div class="col border">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h1>Students</h1>
                            </div>

                            <div class="col my-auto">
                                <a class="btn btn-lg btn-success" href="{{ route('students.create') }}">Add Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h1>Subjects</h1>
                            </div>
                            <div class="col my-auto">
                                <a class="btn btn-lg btn-success" href="{{ route('subjects.create') }}">Add Subject</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($students as $student)
                    <div class="row">
                        <div class="col border d-inline">
                            <b>Name: </b>{{$student->name}}
                            <div class="row">
                                <div class="col">
                                    <b>Course: </b>{{$student->course}}
                                    <div class="row">
                                        <div class="col">
                                            <b>Student id: </b>{{$student->id}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <!--action buttons-->
                                    <a class="btn btn-lg btn-outline-secondary" href="{{route('students.edit',$student->id)}}">EDIT</a>
                                    <a class="btn btn-lg btn-danger" href="{{route('students.destroy',$student->id)}}">DELETE</a>
                                </div>
                            </div>

                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col border">
                                    <h4>Code</h4>
                                </div>
                                <div class="col border">
                                    <h4>Title</h4>
                                </div>
                                <div class="col border">
                                    Actions
                                </div>
                            </div>
                            @foreach ($student->subjects as $subject)
                                <div class="row">
                                    <div class="col border">
                                        {{$subject->code}}
                                    </div>
                                    <div class="col border">
                                        {{$subject->title}}
                                    </div>
                                    <div class="col">
                                        <!--action buttons-->
                                        <a class="btn btn-lg btn-outline-secondary" href="{{route('subjects.edit',$subject->id)}}">EDIT</a>
                                        <a class="btn btn-lg btn-danger" href="{{route('subjects.destroy',$subject->id)}}">DELETE</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <!--subjects-->
            <div class="col ">
                <h1>Subjects</h1>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col border">
                                <h4>Code</h4>
                            </div>
                            <div class="col border">
                                <h4>Title</h4>
                            </div>
                            <div class="col border">
                                <h4>Actions</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($subjects as $subject)
                    <div class="row">
                        <div class="col">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col border">
                                    {{$subject->code}}
                                </div>
                                <div class="col border">
                                    {{$subject->title}}
                                </div>
                                <div class="col border">
                                        <!--action buttons-->
                                        <a class="btn btn-lg btn-outline-secondary" href="{{route('subjects.edit',$subject->id)}}">EDIT</a>
                                        <a class="btn btn-lg btn-danger" href="{{route('subjects.destroy',$subject->id)}}">DELETE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
