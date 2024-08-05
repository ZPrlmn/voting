<!DOCTYPE html>
<html>
<head>
    <title>Voting Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Voting Information</h1>
    
    <h2>Candidates</h2>
    <div class="container">
        <form action="{{ route('vote.cast') }}" method="POST">
            @csrf
            <input type="hidden" name="student_id" id="student_id">
            @foreach($positions as $position)
                <h1>{{ $position->name }}</h1>
                <div class="container row">
                    @foreach($position->candidates as $candidate)
                        <div class="col-4">
                            <p>{{ $candidate->user->first_name }} {{ $candidate->user->last_name }}</p>
                            <p>{{ $candidate->votes }} votes</p>
                            <input type="radio" name="{{ $position->name }}" value="{{ $candidate->student_id }}" required>
                        </div>
                    @endforeach
                </div> 
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Vote</button>
        </form>
    </div>

    <script>
        // Retrieve student_id from local storage and set it in the hidden input field
        document.addEventListener('DOMContentLoaded', (event) => {
            const studentId = localStorage.getItem('student_id');
            if (studentId) {
                document.getElementById('student_id').value = studentId;
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
