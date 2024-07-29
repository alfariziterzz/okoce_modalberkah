<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            background-image: url('https://cdn5.f-cdn.com/contestentries/1578585/21468461/5d62b49ac544b_thumb900.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
        .card-headers {
            font-size: 28px;
            font-weight: 700;
            background: #1075B0;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .btn-primary {
            background: #1075B0;
            border: none;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%; /* Make inputs fill container width */
            box-sizing: border-box; /* Include padding and border in width */
        }
        .form-check-label {
            margin-left: 0.5rem;
        }
        .alert {
            margin-top: 10px;
            padding: 10px;
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-group .checkmark {
            position: absolute;
            right: 10px;
            top: 65%;
            transform: translateY(-50%);
            color: green;
            font-size: 15px;
            display: none;
        }
        .form-group .eye-icon {
            position: absolute;
            right: 10px;
            top: 65%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 15px;
            color: #888;
        }
        .card-body {
            padding: 20px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const emailInput = document.getElementById("email");
            const checkmark = document.querySelector(".checkmark");

            emailInput.addEventListener("input", function() {
                const email = emailInput.value;
                const isValidEmail = validateEmail(email);
                checkmark.style.display = isValidEmail ? "inline" : "none";
            });

            function validateEmail(email) {
                const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return re.test(String(email).toLowerCase());
            }

            const passwordInput = document.getElementById("password");
            const eyeIcon = document.querySelector(".eye-icon");

            eyeIcon.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                eyeIcon.classList.toggle("fa-eye");
                eyeIcon.classList.toggle("fa-eye-slash");
            });
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-headers">Login Dashboard CMS</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                        <span class="checkmark">&#10003;</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <i class="fas fa-eye eye-icon"></i>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
