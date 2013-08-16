<?php
  header("Content-Type: text/html; charset=UTF-8");
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "1234";
  $dbName = "pc";

  $db = mysqli_connect( $dbHost, $dbUser, $dbPass );
  mysqli_query($db,"SET NAMES sjis");
  mysqli_select_db( $db, $dbName )
    or die("データベース" . $dbName . "との接続に失敗しました。");
  $query = "SELECT *" . " FROM pcpartsdb" ;
  $result = mysqli_query( $db , $query )
    or die("データの読み込みに失敗しました:\n " . mysqli_error( $db ) );
    

?>
<html>
<head>
<title>PHP+MySQLの接続確認</title>
</head>
<body><center>
<font size= "15">テストページ</font>
  <TABLE border="1" cellspacing=0 cellpadding=2 width="200">
    <TBODY>
        <TR bgcolor="#66666">
	  <TD width="160"><center>種類</center></TD>	
          <TD width="160"><center>名前</center></TD>
          <TD width="160"><center>金額</center></TD>
          <TD width="180"><center>店名</center></TD>
        </TR>
        <?php
         $data_cnt = 0;
             while ( $row = mysqli_fetch_array( $result ) ){
	       print "<TR>";
               print "<TD width=\"160\">$row[0]</TD>";
	       print "<TD width=\"160\">$row[1]</TD>";
	       print "<TD width=\"160\">$row[2]"円"</TD>";
               print "<TD width=\"180\">$row[3]</TD>";
               print "</TR>";
             }
         ?>
    </TBODY>
  </TABLE>
</center></body>
</html>
