<!doctype html>
<html>

<head>
     <meta charset="utf-8">
     <title>Ajax- Danh sách lớp</title>
     <link href="style/style.css" type="text/css" rel="stylesheet">
     </link>
     <style>
          body {
               font-size: 11pt
          }

          div {
               padding: 3px 5px;
               font: normal 13pt Arial;
          }

          table {
               background-color: #eaeaea;
          }

          td {
               font: normal 11pt Arial
          }

          .hd {
               background-color: navy;
               color: white
          }
     </style>
     <script>
          function sendajax() {
               var lop = document.getElementById("lop").value;
               var objds = document.getElementById("ds");
               var xml = new XMLHttpRequest();
               xml.onreadystatechange = function () {
                    if (xml.readyState == 4) {
                         objds.innerHTML = xml.responseText;
                    }
               }
               url = "ds.php?lop=" + lop;
               xml.open("GET", url, "false");
               xml.send();
          }
     </script>
</head>
<?php
     function initClass($con){
     $sql="Select distinct lop from sinhvien";
     $rs=mysqli_query($con,$sql);
     $str="Chọn lớp: <select id=lop onChange='sendajax();'>";
     while($row=mysqli_fetch_array($rs)){
     $str.="<option value={$row['lop']}>{$row['lop']}</option>";
     }
     $str.="</select>";
     echo $str;
     }
?>
<body>
     <h3>In danh sách theo từng lớp</h3>
     <?php
          include("../inc/connect.php");         
          initClass($con);
     ?>
     <hr>
     <div id=ds>Danh sách</div>
</body>

</html>
