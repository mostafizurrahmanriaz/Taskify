<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Taskify</title>

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
        <div class="title">Create Your Account</div>

        <form action="{{ route('registerSave') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Full Name" name="name">
                @error('name')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email Address" name="email">
                @error('email')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                @error('password')
                    <span style="color: #ff7e5f">{{ $message }} </span>
                @enderror
            </div>

            <!-- Role Selection -->
            <input type="hidden" name="role" id="roleInput" value="customer">
            <div class="mb-3">
                <label class="mb-2">Register As</label>
                <div class="role-select">
                    <div class="role-card active" data-role="customer">Customer</div>
                    <div class="role-card" data-role="provider">Provider</div>
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100">
                Register
            </button>
        </form>

        <div class="link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
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