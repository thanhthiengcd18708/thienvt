<!DOCTYPE html>
<html>
<body>

<h1>TABLE OF INFORMATION PRODUCT </h1>

<?php
ini_set('display_errors', 1);
echo "ATN COMPANY !";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
   
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=

ec2-34-197-188-147.compute-1.amazonaws.com


;port=5432;user=ftbrqmbjzdokhz;password=5d4ba19be2d4ae184872f97936af42e95be0230e2211ea5a7de7104fa7417cca;dbname=d207o5vn0kgdns",
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "SELECT * FROM product";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Product Information </p>';

?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product name</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['productid'] ?></td>
        <td><?php echo $row['productname'] ?></td>
        <td><?php echo $row['price'] ?></td>
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
