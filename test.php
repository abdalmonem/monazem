<?php
/*
backup_tables('localhost','root','','blog');


function backup_tables($host,$user,$pass,$name,$tables = '*')
{

  $link = mysql_connect($host,$user,$pass);
  mysql_set_charset('utf8',$link);
  mysql_select_db($name,$link);
  $return="";

  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');

    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];

    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    //print_r($num_fields);exit;
    $return.= 'DROP TABLE '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";

    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
         // $row[$j] = preg_replace("\n","\\n",$row[$j]);

          $row[$j] = preg_replace("/(\n){2,}/", "\\n", $row[$j]); 

          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";

  }

  //save file
  $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
 // print_r($handle);exit;
  fwrite($handle,$return);
  fclose($handle);


}

*/

include("config.php");
echo"
<Form action='' method='post'' >
<input name='email' />
<input type='submit' />
</form>
";

if(isset($_POST['email'])){
$pm = $_POST['email'];
$q1 = $condb->query("SELECT * FROM blog_users WHERE email='$pm' ");
$q2 = $q1->fetch_array(MYSQLI_ASSOC);
echo $q2["email"];
}
?>
