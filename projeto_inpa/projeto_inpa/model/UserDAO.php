<?php

include('Connection.php');

class UserDAO {
  public function create($name, $email){
     $conn = Connection::open();
     $stmt = $conn->prepare(
        'INSERT INTO user (name,email) VALUES (:name,:email)'
    );

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);

    return $stmt->execute();
  }

  public function list(){
    $conn = Connection::open();
    $sql = 'SELECT * FROM user ORDER BY name';
    $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function update($id, $name, $email) {
     $conn = Connection::open();
     $sql = "UPDATE user SET name = '$name', email = '$email'  WHERE id = $id;";
     $stmt = $conn->prepare($sql);
     return $stmt->execute();
  }

  public function delete($id) {
     $conn = Connection::open();
     $sql = "DELETE FROM user WHERE id = $id;";
     $stmt = $conn->prepare($sql);
     return $stmt->execute();
  }
}

?>
