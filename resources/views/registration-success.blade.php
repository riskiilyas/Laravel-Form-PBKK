<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Succeed</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @if(isset($successMessage))
        <div class="alert alert-success auto-close">
            {{ $successMessage }}
        </div>
    @endif

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Display Form</h3>
                    <div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="{{ asset('storage/images/'.$imagePath) }}"
                            alt="example placeholder" style="width: 300px;" id="previewImage" />
                        </div>

                    </div><br>
                    <ul>
                        <li><strong>Name:</strong> {{ $name }}</li>
                        <li><strong>Address:</strong> {{ $address }}</li>
                        <li><strong>Email:</strong> {{ $email }}</li>
                        <li><strong>Age:</strong> {{ $age }}</li>
                        <li><strong>Height:</strong> {{ $height }}</li>
                        <li><strong>Credit:</strong> {{ $credit }}</li>
                    </ul>
                    <div class="mt-4 pt-2">
                        <a href="{{ route('register.view') }}">Back to Registration Form</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
    <script>
        // Function to preview the selected image
        function previewFile(event) {
            if(event.target.files.length > 0){
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("previewImage");
                preview.src = src;
                preview.style.display = "block";
            } 
        }

        // Automatically close flash messages with the "auto-close" class
        setTimeout(function() {
            document.querySelectorAll('.auto-close').forEach(function(element) {
                element.style.display = 'none'; // Hide the message
            });
        }, 5000); // 5000 milliseconds (5 seconds)
        
    </script>
</body>
</html>