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
    <title>Computer</title>
</head>

<body>
    <div class="container">
        <h1>Edit Issue</h1>

        <form action="{{ route('issues.update', $issues->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="computer_id">Computer</label>
                <select name="computer_id" id="computer_id" class="form-control" required>
                    <option value="">Select Computer</option>
                    @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}"
                        {{ $computer->id == $issues->computer_id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} ({{ $computer->model }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" value="{{ $issues->computer->model }}" required>
            </div>

            <div class="form-group">
                <label for="reported_by">Reported By</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issues->reported_by }}" required>
            </div>

            <div class="form-group">
                <label for="reported_date">Reported Date</label>
                <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ \Carbon\Carbon::parse($issues->reported_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $issues->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="urgency">Urgency</label>
                <select name="urgency" id="urgency" class="form-control" required>
                    <option value="Low" {{ $issues->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issues->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $issues->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Open" {{ $issues->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issues->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issues->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Issues</button>
        </form>
    </div>
</body>