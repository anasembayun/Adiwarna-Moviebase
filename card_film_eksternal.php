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
    <div class="con-img">
        <div class="transparant">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4 mg-top font-white"><b>Track. Discover. Share.</b></h1>
                <p class="lead mg-btm font-white">Track what you watch. Discover what's hot and where
                you can watch it. Share your friends what’s good. </p>
            </div>
        </div>
    </div> 
    <div class="container2">

        <div class="row mg-con border-top">
            <?php
                $endPoint = "https://api.themoviedb.org/3/movie/popular";
                $params = [
                    "api_key" => "7164c5e9b5e74972308f97e603c808ea",
                    "language" => "en-US",
                    "page" => "1",
                    "format" => "json"
                ];
                    
                $url = $endPoint . "?" . http_build_query( $params );
                    
                $ch = curl_init( $url );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close( $ch );
                    
                $result = json_decode( $output, true );
                    
                foreach( $result["results"] as $value ) {
                    $id = $value['id'];
                    echo '<div class="col-sm-3 mb-3">';
                    echo '<div class="card">';
                    echo '<a href="formTambah.php?id='. $id .'"><img src="https://image.tmdb.org/t/p/w500'.$value["poster_path"].'" class="card-img-top"> </a>';
                    echo '<div class="card-body">';
                    echo '<h6>'. $value["title"] .'</h6>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<small class="text-muted">Post on '. $value["release_date"] .'</small>';
                    echo '</div>';
                    echo '</div>';
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
