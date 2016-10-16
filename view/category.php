<?php
    require_once __DIR__."/../model/db/db_connect.php";
        $db = new DB_CONNECT();
        $mysqli = $db->connect();

    function getByParentId($id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM category where parent_id='$id'");

        if (!empty($result)) {
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        }
}
?>
<html>
<head>
    <title>Kategori Deneme Sayfası</title>
</head>
<body>
<ul>
    <?php
    $result=getByParentId(0);
        while ($entry =  mysqli_fetch_array($result)){
            echo "<li>".$entry['name']."</li>";
        }
?>
</ul>
</body>
</html>