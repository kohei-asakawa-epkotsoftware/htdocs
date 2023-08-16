<?php
require_once('../Controller/Connect.php');
require_once('../Controller/AppController.php');

/* Ajaxを経由してPOST受信した「座標」の変数をDBに登録 */
if(!empty($_POST['left'])){
  try{
    $sql  = '
            UPDATE
              sortable
            SET
              left_x = :LEFT,
              top_y  = :TOP
            WHERE
              id = :NUMBER
            ';
            $obj = new AppController();
            $obj->update_sortable($sql, $_POST['left'], $_POST['top'], $_POST['id']);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>