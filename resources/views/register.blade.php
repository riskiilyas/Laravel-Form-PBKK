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
    @if ($errors->any())
    <div class="alert alert-danger auto-close">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    @if(session('success'))
                    echo $request;
                    @else
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                  <form  id="registrationForm" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                            alt="example placeholder" style="width: 300px;" id="previewImage" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                <input type="file" name="image" accept="image/*" class="form-control d-none" id="customFile1" onchange="previewFile(event);"/>
                            </div>
                        </div>
                    </div><br>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name"/><br>
                    <input type="text" name="address" class="form-control form-control-lg" id="address" placeholder="Address"/><br>
                    <input type="text" name="email" class="form-control form-control-lg" id="email" placeholder="Email"/><br>
                    <input type="number" name="age" class="form-control form-control-lg" id="age" placeholder="Age"/><br>
                    <input type="number" name="height" step="0.01" class="form-control form-control-lg" id="height" placeholder="Height"/><br>
                    <input type="number" name="credit" step="0.01" class="form-control form-control-lg" id="credit" placeholder="Credit"/><br>

                    <div class="mt-4 pt-2">
                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>
                  </form>
                  @endif
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
