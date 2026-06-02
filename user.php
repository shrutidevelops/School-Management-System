<?php
include "connect.php";
class user extends connect
{
    public  function __construct()
    {
       parent ::__construct();
    }
   public function user()
   {
      if($this->db_found==true)
      {                
         $sql="select * from login";
         $f=0;
         $r=mysqli_query($this->db_found, $sql);
         while($db_field=mysqli_fetch_assoc($r))
         { 
             if($db_field['id']==$_POST['t1'])
             {
                 if($db_field['pwd']==$_POST['t2'])
                 {
                    $f=1;
                    break;
                 }
             }
          }
        if($f==1)
        {
          echo "ID already exists";
        }
          else
          {
            $sql="insert into login values('$_POST[t1]','$_POST[t2]')";
            mysqli_query($this->db_found, $sql);
            echo " <script> alert ('Record saved')</script>";
         }
     }
       else
       echo "Database Not Found";
   }
}

$ob=new user();
if(isset($_REQUEST["b1"]))
{
   $ob->user();
}

echo "<form name=f method=post action=user.php>
<body>
<table border='1' align='center'>
<tr>
    <td>LOGIN ID</td>
    <td><input type=text name=t1></td>
</tr>
<tr>
    <td>LOGIN PASSWORD</td>
    <td><input type=password name=t2></td>
</tr>
<tr>
    <td colspan='2' align='center'>
        <input type=submit value=Save name=b1>
   </td>
</tr>
</table>
</form>
</body>";

?>
