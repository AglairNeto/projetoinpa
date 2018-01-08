<?php
include('../model/UserDAO.php');

  //if ternário se existe a ACTION senao null
  $action = ( isset($_GET['action']) ? $_GET['action'] : null );

  if ($action === "create") {
      $name = $_POST['name'];
      $email = $_POST['email'];

      $userdao = new UserDAO();
      echo $userdao->create($name, $email);

  } elseif($action === "update") {

      $id = ( isset($_GET['id']) ? $_GET['id'] : 0 );
      $name = $_POST['name'];
      $email = $_POST['email'];
      $userdao = new UserDAO();
      echo $userdao->update($id,$name,$email);

  } elseif($action === "delete") {

      $id = ( isset($_GET['id']) ? $_GET['id'] : 0 );
      $userdao = new UserDAO();
      echo $userdao->delete($id);

  } elseif($action === "list") {
      $userdao = new UserDAO();
      echo json_encode($userdao->list());
  } else {
      echo "error";
  }

 ?>
