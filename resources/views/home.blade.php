<html>

<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>


<body style="">



    <div class="container">
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="row">
                <div class="col-8">
                    <img src="/img/gruh.png" alt="logo" style="height:80%;width:120%;" />
                </div>

                <div class="col">
                    <!-- Customer Form -->
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample" style="margin-left:50%;margin-top:25%;">
                        Customer
                    </a><br>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#sidebar" role="button"
                        aria-controls="sidebar" style="margin-left:50%;margin-top:12pt">
                        Helper
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample" aria-expanded="false"
                        aria-controls="collapseWidthExample" style="margin-left:50%;margin-top:12pt">
                        Toggle width collapse
                    </button>
                    <div style="min-height: 120px;">
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            <div class="card card-body" style="width: 300px;">
                                <form>
                                    <label>Enter Email</label>
                                    <input type="email" name="ni" id="ni" value="abd@gmail.com">
                                    <input type="button" value="submit" onclick="fetchData()">
                                </form>

                            </div>





                        </div>

                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <a class="btn btn-secondary" href="{{ route('register.get') }}"
                                    role="button">Register</a>
                                <a class="btn btn-secondary" href="{{ route('login') }}" role="button">login</a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>

    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Helper</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <a class="btn btn-secondary" href="{{ route('signup') }}" role="button">Register</a>
                <a class="btn btn-secondary" href="{{ route('signin') }}" role="button">login</a>
            </div>
        </div>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        function fetchData() {
            // preventDefault();
            console.log("dfgd");
            const input = document.getElementById("ni");
const inputValue = input.value;
            $.ajax({
                url: "{{ route('getotp.build') }}",
                type: "GET",
                datatype: "json",
                data: {
                    email: inputValue,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#response").text(response.message);
                },
                error: function(xhr) {
                    $("#response").text("Error: " + xhr.statusText);
                }
            });
        }
    </script>
</body>

</html>
