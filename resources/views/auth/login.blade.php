<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Taskify</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/register-page.css">
</head>
<body>

<div class="register-container">
    <div class="register-card">

        <div class="brand">Taskify</div>
        <div class="title">Login Your Account</div>

        <form action="{{ route('loginSave') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                @error('email')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
                @error('password')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-custom w-100">
                Login
            </button>
        </form>

        <div class="link">
            Don't have an account? <a href="{{ route('signUp') }}">Register</a>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const roleCards = document.querySelectorAll('.role-card');
    const roleInput = document.getElementById('roleInput');

    roleCards.forEach(card => {
        card.addEventListener('click', function () {

            // remove active class
            roleCards.forEach(c => c.classList.remove('active'));

            // add active class
            this.classList.add('active');

            // update hidden input
            roleInput.value = this.getAttribute('data-role');

            console.log("Selected role:", roleInput.value); // debug
        });
    });

});
</script>


</body>
</html>