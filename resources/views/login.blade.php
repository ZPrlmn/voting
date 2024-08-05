<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form id="loginForm" action="{{ route('login.submit') }}" method="POST">
        @csrf
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        <button type="submit">Login</button>
    </form>
    
    <p>
        Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </p>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            const studentId = document.getElementById('student_id').value;
            localStorage.setItem('student_id', studentId);
            console.log('Student ID saved to localStorage:', localStorage.getItem('student_id'));
        });
    </script>
    
</body>
</html>
