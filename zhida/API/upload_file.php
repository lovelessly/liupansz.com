<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

    $ext_name = array_pop(explode('.',$_FILES["file"]["name"]));
    $file_name = md5($_FILES["file"]["name"]) . '.' . $ext_name;

    if (file_exists("../upload/" . $file_name))
      {
      echo json_encode(array('status'=> 0, 'msg'=> $_FILES["file"]["name"] . " already exists. "));
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $file_name);
      echo "Stored in: " . "../upload/" . $file_name;
      }
    }
  }
else
  {
  echo $_FILES["file"]["type"];
  }
?>
