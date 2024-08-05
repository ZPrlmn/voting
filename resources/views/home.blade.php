<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <a href="/candidates">Candidates</a>
    <a href="/positions">Positions</a>
    <a href="/voting">Vote</a>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check for the presence of student_id in local storage
        const studentId = localStorage.getItem('student_id');
        
        // If no student_id is found, redirect to the login page
        if (!studentId) {
            window.location.href = '/login';
        }
    });
</script>
</html>
