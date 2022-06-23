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
            include 'config.php';
            $sql = "select * from tb_komen";
            $result = mysqli_query($link , $sql);
    
            foreach( $result as $row ) {
                echo '<div class="container2 font-white border-bottom" >';
                echo '<br>';
                echo '<h5><b>'. $row['judul'] .'</b></h5>';
                echo '<p class="blog-post-meta">Review by <b>'. $row['nama'] .' </b>  <i>at : '. $row['update_at'] .'</i> </p> ';
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
