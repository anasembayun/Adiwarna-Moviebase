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
        <?php
                $id = $_GET['id'];
                $curl= curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
                curl_setopt($curl, CURLOPT_URL, 'http://192.168.56.105/api_moviebase/komen_crud_api.php?id='.$id.'');
                $res = curl_exec($curl);
                $json = json_decode($res, true);
            //var_dump($json);
            ?>
        
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 font-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Adiwarna Moviebase</h5>
            <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 font-white" href="card_film_eksternal.php">Home</a>
        <a class="p-2 font-white" href="reviewWindows.php">Review</a>
        <a class="p-2 font-white" href="review.php">Review2</a>
            </nav>
        </div>
    <div class="container2">
        
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h2 class="font-white">Update Data</h2>
        </div>
        <div class="container" style="background-color:#F7F7F6; padding:40px;">  
            <form action="edit.php" method="post" id="form">
                <div class="form-group">
                    <strong>Id :</strong>
                    <input type="text" name="id" class="form-control" placeholder="Id" value="<?php echo"$id";?>" >
                </div>
                <div class="form-group">
                    <strong>Nama :</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo($json["data"][0]["nama"]); ?>" >
                </div>
                <div class="form-group">
                    <strong>Judul Film :</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo($json["data"][0]["judul"]); ?>" >
                </div>
                <div class="form-group">
                    <strong>Komen :</strong>
                    <textarea name="komen" class="form-control" placeholder="Silahkan tuliskan komentar Anda"><?php echo($json["data"][0]["komen"]); ?></textarea>
                </div> 
                <input type="hidden" name="created_at" class="form-control"  value="<?php $tgl=date('Y-m-d h:i:sa'); echo $tgl;?>" >
                <input type="hidden" name="update_at" class="form-control" value="<?php $tgl1=date('Y-m-d h:i:sa'); echo $tgl1; ?>" > 

                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <a href="reviewWindows.php" class="btn btn-primary">Cancel</a>
            </form>
        </div>
        
    </div>
    <br>
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
