<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            get_komen($id);
         }
         else
         {
            get_komens();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            update_komen($id);
         }
         else
         {
            insert_komen();
         }     
         break; 
   case 'DELETE':
         $id=intval($_GET["id"]);
            delete_komen($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}



   function get_komens()
   {
      global $mysqli;
      $query="SELECT * FROM tb_komen";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Komen Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   function get_komen($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM tb_komen";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Komen Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function insert_komen()
      {
         global $mysqli;
         if(!empty($_POST["nama"])){
            $data=$_POST;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         $arrcheckpost = array('nama' => '','judul' => '','komen' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));
         if($hitung == count($arrcheckpost)){

               $result = mysqli_query($mysqli, "INSERT INTO tb_komen SET
               nama = '$data[nama]',
			      judul = '$data[judul]',
               komen = '$data[komen]'");                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Komen Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Komen Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

      function update_komen($id)
      {
         global $mysqli;
         $arrcheckpost = array('id' => '','nama' => '','judul' => '', 'komen' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
            $result = mysqli_query($mysqli, "UPDATE tb_komen SET
                  nama = '$_POST[nama]',
                  judul = '$_POST[judul]',
                  komen = '$_POST[komen]'
                  WHERE id ='$id'");
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Komen Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Komen Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }

   function delete_komen($id)
   {
      global $mysqli;
      $query="DELETE FROM tb_komen WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Komen Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Komen Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

?> 
