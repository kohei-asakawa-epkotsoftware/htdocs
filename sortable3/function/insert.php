<?php
require_once('../Controller/Connect.php');
require_once('../Controller/AppController.php');

/* 新規氏名+性別をデータベースへ登録 */
if(!empty($_POST['inputName'])){
  try{
    $sql = '
            INSERT INTO sortable(
              name,
              gender_id
            )
            VALUES(
              :ONAMAE,
              :GENDER
            )
            ';
            $obj = new AppController();
            $obj->insert_sortable($sql, $_POST['inputName'], $_POST['inputGender']);

    header('location:'.$_SERVER["HTTP_REFERER"]);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>