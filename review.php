<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Adiwarna | Moviebase</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">
        <!-- Bootstrap core CSS -->
        <link href="../cinema/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../cinema/pricing.css" rel="stylesheet">
        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .bg-body {
        background-color: rgba(19, 22, 27, 0.989);
        }
        .con-img{
        background-image: url(img02.jpg); 
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }

        .transparant{
            background-color:rgba(0, 0, 0, 0.6);
            background-size: cover;
        }
        .font-white{
            color:white;
        }
        .mg-top{
            margin-top: 320px;
        }

        .mg-btm{
            margin-bottom: 300px
        }

        .mg-con{
            margin-top: 50px;
            padding: 50px;
        }

        .container2{
            max-width: 1140px;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        </style>   
    </head>
    <body class="bg-body">
        
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 font-white shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Adiwarna Moviebase</h5>
    <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 font-white" href="card_film_eksternal.php">Home</a>
        <a class="p-2 font-white" href="reviewWindows.php">Review</a>
        <a class="p-2 font-white" href="review.php">Review2</a>
    </nav>
    </div>
    <div>
    <div class="container2">
        <div>
        <?php
            $curl= curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.105/api_moviebase/komen_crud_api.php');
            $res = curl_exec($curl);
            $result = json_decode( $res, true );
    
            foreach( $result["data"] as $row ) {
                echo '<div class="container2 font-white border-bottom" >';
                echo '<br>';
                echo '<h5><b>'. $row['judul'] .'</b></h5>';
                echo '<p class="blog-post-meta">Review by <b>'. $row['nama'] .' </b>  <i>at : '. $row['update_at'] .'</i> </p> ';
                echo '<div class="btn-group" Style="float:right;">';
                echo '<a href="delete.php?id='. $row['id'] . '" type="button" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg></a>';
                echo '<a href="formEdit.php?id='. $row['id'] .'" type="button" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a>
                </div>';
                echo '<p>'. $row['komen'] .'</p>';
                
            echo '</div>';
        }
        ?>
        </div>   
    </div>
    <br>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="font-white">© 2022 Ana Sembayun, 464386</span>
        </div>
    </footer>

    </body>
    </html>
