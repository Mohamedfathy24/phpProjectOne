<!DOCTYPE html>
<html>
<head>
  <title>Student affairs administration</title>
  <style>
    
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    #mother {
      margin-top: 50px;
      width: 80%;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
    }

    h3 {
      color: #333;
      font-size: 18px;
      margin-bottom: 10px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      background-color: #4CAF50;
      color: #fff;
      padding: 8px 16px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    #tab {
      width: 790px;
      border-collapse: collapse;
      margin-top: 20px;
    }

    #tab th,
    #tab td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    #tab th {
      background-color: #4CAF50;
      color: #fff;
    }

    #div {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    aside {
      display: flex;
      justify-content: space-between;
    }

    img {
      height: 370px;
    width: 100%;
    }


  </style>
</head>
<body dir="rtl">
  <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'stdl';
    $conn = mysqli_connect($host, $user, $pass, $db);
    $res = mysqli_query($conn, "select * from student3");

    # تعديلات:
    $id = '';
    $name = '';
    $address = '';

    if (isset($_POST['id'])) {
      $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }
    if (isset($_POST['address'])) { // تغيير 'adress' إلى 'address'
      $address = $_POST['address'];
    }

    $sqls = '';

    if (isset($_POST['add'])) {
      $sqls = "insert into student3 value ($id, '$name', '$address')"; // تغيير $adress إلى $address
      mysqli_query($conn, $sqls);
      header("location:home.php");
    }
    if (isset($_POST['del'])) {
      $sqls = "delete from student3 where name = 'Mohamed Fathi' ";
      mysqli_query($conn, $sqls);
      header("location:home.php");
    }
  ?>

  <div id="mother">
    <form method="post">
    <img src="https://pioneers-solutions.com/uploads/student-affairs-department.webp" alt="لوجو الصورة">
      <aside>
    
      <div id="div">
          <h3>لوحة إدارة الطلاب</h3>
          <label>رقم الطالب:</label>
          <br>
          <input type="text" name="id">
          <label>اسم الطالب:</label>
          <br>
          <input type="text" name="name">
          <label>عنوان الطالب:</label>
          <br>
          <input type="text" name="address">
          <br><br>

          <button name="add">إضافة طالب</button> <br>
          <button name="del">حذف طالب</button> <br>
        </div>
        <main>
          <table id="tab">
            <tr>
              <th>الرقم التسلسلي</th>
              <th>اسم الطالب</th>
              <th>عنوان الطالب</th>
            </tr>
            <?php
              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>". $row['id'] . "</td>";
                echo "<td>". $row['name'] . "</td>";
                echo "<td>". $row['adress'] . "</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </main>
      
      </aside>
    </form>
  </div>
</body>
</html>