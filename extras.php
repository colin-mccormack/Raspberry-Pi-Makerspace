<!DOCTYPE html>
<html>
  <head>
    <title>Extras</title>
    <link href="style.css" rel="stylesheet" type="text/css">
	<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-Z30TWKV0GY');
	</script>
  </head>
  <body>
    <div class="header">
			<a href="index.html" class="logo">Raspberry Pi Makerspace</a>
			  <div class="header-right">
			    <a href="index.html">Home</a>
			    <a href="contact.html">Contact</a>
			    <a href="products.html">Products</a>
          <a class="active" href="extras.html">Other projects</a>
			  </div>
		</div>
    <div class="container">
	    <div style="text-align:center">
	      <h1>Extras</h1>
	    </div>
	  <form method="post">
      <label>Search</label>
      <input type="text" name="search">
      <input type="submit" name="submit">
      
      </form>
  </body>
</html>

<?php
  $con = new PDO("mysql:host=localhost;dbname=Elements",'colin','lego');
  if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `Elements` WHERE name = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> excecute();

    if($row = $sth->fetch())
    {
?>
       <br><br><br>
        <table>
             <tr>
               <th>Name</th>
               <th>Symbol</th>
               <th>Atomic Number</th>
               <th>Atom</th>
               <th>Charge</th>
               <th>Multivalent</th>
          </tr>
          <tr>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->symbol; ?></td>
            <td><?php echo $row->atomic number; ?></td>
            <td><?php echo $row->atom; ?></td>
            <td><?php echo $row->charge; ?></td>
            <td><?php echo $row->multivalent; ?></td>
          </tr>
  </table>
<?php  
  }
  else{
    echo "Name Does Not Exist";
  }
}
?>