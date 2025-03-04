<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamPlus Onboarding</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @livewireStyles

    <style>
        .is-invalid {
            border: 1px solid red;
        }
        .error-message {
            margin-top: 5px;
            font-size: 0.875rem;
        }

    </style>
</head>
<body>
<div class="container mt-5">

    <livewire:register-form/>

</div>

@livewireScripts

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function toggleError(inputElement, errorMessage, isValid) {
            const errorElement = inputElement.siblings('.error-message');

            if (!isValid) {
                inputElement.addClass('is-invalid');
                if (errorElement.length === 0) {
                    inputElement.after('<div class="text-danger error-message">' + errorMessage + '</div>');
                }
            } else {
                inputElement.removeClass('is-invalid');
                if (errorElement.length > 0) {
                    errorElement.remove();
                }
            }
        }

        $('#name').on('blur', function() {
            const name = $(this).val();
            const namePattern = /^[a-zA-Z\s]+$/;

            toggleError($(this), 'Name should not contain numbers or special characters.', name.match(namePattern));
        });

        $('#email').on('blur', function() {
            const email = $(this).val();
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            toggleError($(this), 'Please enter a valid email address.', email.match(emailPattern));
        });

        $('#number').on('blur', function() {
            const phone = $(this).val();

            toggleError($(this), 'Phone number should be at least 7 digits long.', phone.length >= 7);
        });
    });
</script>


</body>
</html>
