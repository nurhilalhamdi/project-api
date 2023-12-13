<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome, {{$nama}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard/profile/{{$id}}">Edit profile</a></li>
                    </ul>
                </li>
            </ul>
            <form method="post" action="/logout">
                @csrf
                <button class="btn btn-danger" type="submit">Sign Out</button>
            </form>
        </div>
    </div>
</nav>

<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col-sm-8 py-5">
                <h1 class="display-5 fw-bold  mb-3">Search Student</h1>
                <input class="form-control me-2" id="searchInput" type="search" placeholder="Search Name, NIM, or Join Date" aria-label="Search">
            </div>
            <div class="resultsContainer" id="resultsContainer"></div>
            <div class="table-responsive col-sm-8">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>NIM</th>
                            <th>YMD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">No data.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const resultsContainer = document.getElementById('resultsContainer');

            searchInput.addEventListener('input', function() {
                const query = searchInput.value.trim();

                if (query.length >= 3) {
                    fetchLiveSearchResults(query);
                } else {
                    resultsContainer.innerHTML = '';
                }
            });

            function fetchLiveSearchResults(query) {
                axios.get(`/live-search?query=${query}`)
                    .then(response => {
                        console.log('Response:', response.data.DATA);
                        displayResults(response.data.DATA);
                    })
                    .catch(error => console.error('Error fetching live search results:', error));
            }

            function displayResults(data) {
                let htmlView = '';
                const resultsArray = Object.values(data);
                if (resultsArray.length > 0) {
                    resultsArray.forEach(item => {
                        htmlView += `<tr><td>${item.NAMA}</td><td>${item.NIM}</td><td>${item.YMD}</td></tr>`;
                    });
                } else {
                    htmlView += `<tr><td colspan="4">No data.</td></tr>`;
                }
                $('tbody').html(htmlView);
            }
        });
    </script>

</body>

</html>