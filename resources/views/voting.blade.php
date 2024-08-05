<!DOCTYPE html>
<html>
<head>
    <title>Voting Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Voting Information</h1>
    <p id="studentIdDisplay"></p>
    
    <h2>Candidates</h2>
    <div class="container">
        <form method="POST" action="{{ route('voting.store') }}">
            @csrf

            @foreach($positions as $position)
                <h2>{{ $position->name }}</h2>
                <div class="container row">
                    @foreach($position->candidates as $candidate)
                        <div class="col-4">
                            <p>{{ $candidate->user->first_name }} {{ $candidate->user->last_name }}</p>
                            <p>{{ $candidate->votes }} votes</p>
                            <!-- Radio button to select the candidate, with the value being the candidate's student_id -->
                            <input type="radio" name="votes[{{ $position->id }}]" value="{{ $candidate->student_id }}" required> Vote for this candidate
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary" onclick="getStudentId()">Submit Vote</button>
        </form>
        <!-- Hidden input to hold student ID for form submission -->
        <input type="hidden" id="studentIdInput" name="student_id">
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    let studentId = localStorage.getItem('student_id');
    console.log(studentId, 'from localStorage');
    document.getElementById('studentIdDisplay').textContent = studentId;
    document.getElementById('studentIdInput').value = studentId;

    fetch('{{ route('voting.getId') }}?student_id=' + studentId)
        .then(response => response.json())
        .then(data => {
            console.log('Response from getId:', data);
        });
});


        function getStudentId() {
            // This function is triggered when the Submit Vote button is clicked
            let studentId = localStorage.getItem('student_id');
            console.log(studentId, 'from localStorage');
        }
    </script>
</body>
</html>
