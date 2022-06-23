<?php
include_once 'config.php';

if(isset($_POST['submit']))
{    

$nama = $_POST['nama'];
$judul = $_POST['judul'];
$komen = $_POST['komen'];
$created_at = $_POST['created_at'];
$update_at = $_POST['update_at'];
$id = $_POST['id'];


//update data ke database local
        $sql = "update tb_komen set id='$id', nama='$nama', judul='$judul', komen='$komen' where id=$id";
        if (mysqli_query($link, $sql)) {
            echo "<center>Record has been updated successfully to local database!<br>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
        mysqli_close($link);


// update data di ubuntu OS, melalui REST API
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://192.168.56.105/api_moviebase/komen_crud_api.php?id='.$id.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
        'id' =>  $id, 
        'nama' =>  $nama,
        'judul' =>  $judul,
        'komen' =>  $komen,
        'created_at' =>  $created_at,
        'update_at' =>  $update_at,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
echo "<br>Sukses mengupdate data di ubuntu server !";
echo "<br><a href=reviewWindows.php> OK </a>";
}
?>
