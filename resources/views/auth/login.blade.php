<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/freeads.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registration From</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<header>

</header>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class = "max-w-lg mx-auto p-6 bg-white rounded shadow-md">

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong class="font-bold">Ooops!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
                     
                @endif
               
                <form action="{{ route('login.signin') }}" class="p-4 border rounded bg-white shadow-sm" id="login" onsubmit="process(event)" method="POST">
                    
                <h2 class="text-center mb-4">Log in</h2>
                        @csrf 
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter your email"
                            required>
                        @error('email')
                            <div class="text-danger mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Enter your password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Enter your password"
                            required>
                        @error('password')
                            <div class="text-danger mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">SE CONNECTER</button>
                    <p>Don't have an account? <a href="{{ route('sign-up') }}"class="text-[#007BFF] font-bold hover:underline decoration-2 underline-offset-4 transition-all">Sign up here</a> or go to<a href="{{ route('ads.index') }}" class="text-[#007BFF] font-bold hover:underline decoration-2 underline-offset-4 transition-all"> home page</a></p>
                </form>
                 </div>
                <div class="alert alert-info" style="display: none;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

</html>
<?php  ?>
