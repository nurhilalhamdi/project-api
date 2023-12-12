<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        @if(isset($error))
        <div class="row">
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        </div>
        @endif


        <div class="align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <h1 class="display-4 fw-bold lh-1 mb-3">Login</h1>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 my-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/login">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="nim" type="text" class="form-control" id="nim" placeholder="id">
                        <label for="nim">NIM</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>

                    <div class="py-2">
                        <Span>Belum punya akun? </Span><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="/signup">
                            Daftar sekarang!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>