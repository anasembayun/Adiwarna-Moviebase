<?php
                $id = $_GET['id'];  
                $endPoint = "https://api.themoviedb.org/3/movie/$id";
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

                $judul = $result["title"];
                echo '<h6>'. $result["title"] .'</h6>';
            ?>