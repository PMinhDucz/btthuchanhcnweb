<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Computers</title>
</head>

<body>
    <div class="container h-100 mt-5">
        <h2>Create New Issues</h2>
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="reported_by">Reported By</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" required>
            </div>

            <div class="form-group">
                <label for="computer_id">Computer</label>
                <select name="computer_id" id="computer_id" class="form-control" required>
                    @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reported_date">Reported Date</label>
                <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="urgency">Urgency</label>
                <select name="urgency" id="urgency" class="form-control" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Issue</button>
        </form>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>