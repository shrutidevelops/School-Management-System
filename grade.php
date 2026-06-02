<?php
include "connect.php";
class grade extends connect
{
    public  function __construct()
    {
       parent ::__construct();
    }
      public function save()
     {
      if($this->db_found==true)
      {
         //To check grade id is primary key or not
        	$f=0;
        	$sql="select * from grade";
        	$r=mysqli_query($this->db_found, $sql);
        	while($db_field=mysqli_fetch_assoc($r))
         	{	 
             		if($db_field['grade_id']==$_POST['t1'])
             		{
                		$f=1;
                		break;
             		}
          	}
        	if($f==1)
        	{
          		echo "<script>alert('ID already exists')</script>";
        	}
          	else
          	{
                        $sql="insert into grade values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
        		mysqli_query($this->db_found, $sql);
        		echo " <script> alert ('Record saved')</script>";
      		}
       }
      	else
       	{
          	echo " <script> alert ('Database Not Found')</script>";
       	}
     }//End of save
     public function update()
     {
        if($this->db_found==true)
       {
          $sql="update grade set name='$_POST[t2]', desc1='$_POST[t3]' where grade_id ='$_POST[t1]'";
        mysqli_query($this->db_found, $sql);
        echo " <script> alert ('Record updated')</script>";
      }
      else
      {
         echo " <script> alert ('Database Not Found')</script>";
      }
    }
    public function delete()
    {
        if($this->db_found==true)
      {
        $sql="delete from grade where grade_id ='$_POST[t1]'";
        mysqli_query($this->db_found, $sql);
        echo " <script> alert ('Record deleted')</script>";
      }
      else
      {
         echo " <script> alert ('Database Not Found')</script>";
      }
    }
   public function allsearch()
   {
     if($this->db_found==true)
     {
        $sql="select * from grade";
        $r=mysqli_query($this->db_found, $sql);
       echo "<table border=1>
                   <tr>
                          <th>Grade ID </th>
                          <th>Name</th>
                          <th>Description</th>
                  </tr>";
      while($db_field=mysqli_fetch_assoc($r))
      {
          echo "<tr><th>".$db_field['grade_id']."</th>";
          echo "<th>".$db_field['name']."</th>";
          echo "<th>".$db_field['desc1']."</th>";
          echo "</tr>";
      }
       echo "</table>";
     }
     else
         echo "Database Not Found";
    }  
     public function psearch()
   {
     if($this->db_found==true)
     {
        $sql="select * from grade where grade_id='$_POST[t1]'";
        $r=mysqli_query($this->db_found, $sql);
       echo "<table border=1>
                   <tr>
                          <th>Grade ID </th>
                          <th>Name</th>
                          <th>Description</th>
                  </tr>";
      while($db_field=mysqli_fetch_assoc($r))
      {
          echo "<tr><th>".$db_field['grade_id']."</th>";
          echo "<th>".$db_field['name']."</th>";
          echo "<th>".$db_field['desc1']."</th>";
          echo "</tr>";
      }
       echo "</table>";
     }
     else
         echo "Database Not Found";
    }
    public function spsearch()
    {
     if($this->db_found==true)
     {
        $colnm=$_POST["s"];
        $sql="select * from grade where $colnm='$_POST[t1]'";
        $r=mysqli_query($this->db_found,$sql);
        echo"<table border=1>
        <tr>
            <th>Grade ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>";
        while($db_field=mysqli_fetch_assoc($r))
        {
            echo"<tr><th>".$db_field['grade_id']."</th>";
            echo "<th>".$db_field['name']."</th>";
            echo "<th>".$db_field['desc1']."</th>";
            echo"</tr>";
        }
        echo"</table>";
     }
        else
          echo"<script> alert('Database Not Found') </script>";  
    }
   public function test()
   {

   }  
}

$ob=new grade();
if(isset($_REQUEST["b1"])) // To save
{
   $ob->save();
}
if(isset($_REQUEST["b2"])) // To update
{
   $ob->update();
}
if(isset($_REQUEST["b3"])) // To delete
{
   $ob->delete();
}
if(isset($_REQUEST["b4"])) // To allsearch
{
   $ob->allsearch();
}
if(isset($_REQUEST["b5"])) // To psearch
{
   $ob->psearch();
}
if(isset($_REQUEST["b6"])) // To spsearch
{
   $ob->spsearch();
}
if(isset($_REQUEST["b0"])) // To new
{
   $ob->test();
}

echo'
<head>
<style>
body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #e9ecef;   /* light grey background */
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #2c3e50;   /* dark blue */
    margin-bottom: 20px;
}

table {
    border-collapse: collapse;
    width: 70%;
    margin: auto;
    background: #ffffff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

th {
    background: #34495e;   /* dark blue-gray */
    color: #ffffff;
    padding: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

td input[type="text"], td select {
    width: 95%;
    padding: 8px;
    border: 1px solid #bbb;
    border-radius: 4px;
    outline: none;
}

td input[type="text"]:focus, td select:focus {
    border-color: #2980b9;   /* blue highlight */
    box-shadow: 0 0 5px rgba(41,128,185,0.5);
}

input[type="submit"], input[type="button"] {
    background: #2980b9;   /* blue button */
    color: white;
    border: none;
    padding: 8px 15px;
    margin: 5px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

input[type="submit"]:hover, input[type="button"]:hover {
    background: #1f6391;   /* hover dark blue */
}
</style>
</head>
';

echo '<form name=f method=post action=grade.php>
<body>
<table border=1 align=center>
<tr>
    <td>Grade ID</td>
    <td><input type=text name=t1></td>
</tr>

<tr>
    <td>Name</td>
    <td><input type=text name=t2></td>
</tr>
<tr>
    <td>Description</td>
    <td><input type=text name=t3></td>
</tr>

<tr>
<th colspan=2><input type=button value=New>
<input type=submit value=Save name=b1>
<input type=submit value=Update name=b2>
<input type=submit value=Delete name=b3>
</th>
</tr>
<tr>
<th colspan=2>
<input type=submit value=Allsearch name=b4>
<input type=submit value=PSearch name=b5>
<input type=button value=Spsearch onclick=spsearch()>
<input type=button value=Menu onclick=menu()>
</th>
</tr>
</table>
</form>
</body>
<script>
  function spsearch()
  {
   window.open("spsearch.html","_self")
  }
  function menu()
  {
    window.open("menu.html","_self")
  }

</script>';

?>
