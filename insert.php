<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
$id = $_POST['id']; 
$nama = $_POST['nama'];  
$judul = $_POST['judul'];
$komen = $_POST['komen'];

//memasukkan data ke database local
      $sql = "INSERT INTO tb_komen (id,nama,judul,komen)
      VALUES ('$id','$nama','$judul','$komen')";
      if (mysqli_query($link, $sql)) {
            echo "<center>New record has been added successfully to local database!<br>";
      } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
      }
      mysqli_close($link);

// memasukkan data ke server ubuntu, lewat API
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://192.168.56.105/api_moviebase/komen_crud_api.php';
$ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
$jsonData = array(
      'id' =>  $id,
      'nama' =>  $nama,
      'judul' =>  $judul,
      'komen' =>  $komen,
);
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//pastikan mengirim dengan method POST
curl_setopt($ch, CURLOPT_POST, true);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
//Execute the request
$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("message :  {$result["message"]} "); 
echo "<br>Sukses terkirim ke ubuntu server !";
echo "<br><a href=reviewWindows.php> OK </a>";
}
?>