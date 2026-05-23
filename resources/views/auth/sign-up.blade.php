<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registration From</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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
                @if (session('Success'))
                <div class="bg-red-100 border border-green-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong class="font-bold">Success !</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                     
                @endif


                <form action="{{ route('registration.sign-up') }}" class="p-4 border rounded bg-white shadow-sm" onsubmit="process(event)" method="post">
                        @csrf
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" name="name" class="form-control" id="name"  value="{{ old(key: 'name') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control"  value="{{ old('email') }}" id="email" placeholder="name@exemple.com"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Phone Number</label>
                        <input type="integer" name="telephone" class="form-control" id="phone" placeholder="0707070707"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
            
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I accept the conditions</label>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
                    <p>Do you already have an account?<a href="{{ 'login' }}"> Log in</a> or go to<a href="{{ 'header' }}"> home page</a></p>
                    <p>Do you already have an account?<a href="{{ 'login' }}" class="text-[#007BFF] font-bold hover:underline decoration-2 underline-offset-4 transition-all"> Log in</a> or go to<a href="{{ 'header' }}" class="text-[#007BFF] font-bold hover:underline decoration-2 underline-offset-4 transition-all"> home page</a></p>
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
<?php ?>
