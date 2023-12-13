<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container">
        <div class="row">

            <div class="align-items-center g-lg-5 py-5">
                @if(isset($error))
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                </div>
                @endif
                <div class="col-md-10 mx-auto col-lg-5">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Profile</h1>
                </div>
                <div class="col-md-10 mx-auto col-lg-5 my-5">

                    <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/dashboard/profile/{{$data->id}}/update">
                        @csrf
                        <div class="form-check p-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Edit Profile
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="id" value="{{$data->nama}}" disabled>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="nim" type="number" class="form-control" id="nim" placeholder="id" value="{{$data->nim}}" disabled>
                            <label for="nim">NIM</label>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary " id="editButton" type="submit" disabled>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('flexCheckDefault').addEventListener('change', function() {
        var namaField = document.getElementById('nama');
        var nimField = document.getElementById('nim');
        var button = document.getElementById('editButton');

        if (this.checked) {

            namaField.removeAttribute('disabled');
            nimField.removeAttribute('disabled');
            button.removeAttribute('disabled');
        } else {
            namaField.setAttribute('disabled', 'disabled');
            nimField.setAttribute('disabled', 'disabled');
            button.setAttribute('disabled', 'disabled');
        }
    });
</script>

</html>