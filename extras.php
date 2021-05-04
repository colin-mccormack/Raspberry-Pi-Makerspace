
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
	    <div class="explain">
		    <p>Our developers have created this search function using a database with information for chemistry. We hope to set up a search function for easy verification regarding test answers. 
			    This will hopefully reduce the amount of time you spend searching for answers. Currently, you can search by an Element's name or Symbol. We hope to vastly expand our database and we are always looking for suggestions for information that might be needed on a test. 
			    Please visit our contact page and send us your suggestions for what we should add next!</p>
		    <p>Go ahead and enter an element name or symbol in the search bar below!</p>
	    </div>
	    <br>
	    <br>
	  <form method="post">
      		<label>Search By Element Name Or Symbol</label>
      		<input type="text" name="search1">
      		<input type="submit" name="submit1">
      		<label>Search By Atomic Weight</label>
      		<input type="text" name="search2">
      		<input type="submit" name="submit">
      	</form>
	<!-- <img src="version-periodic-table-elements.jpg" alt="Periodic Table from Encyclopedia Britannica" style="height: 250px; float: right;"/> -->
<?php
	function elementsoutput(&$sth, $str){
		
		$sth = $con->prepare("SELECT * FROM Elements WHERE name = '$str' OR symbol = '$str'");

		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();
		if($row = $sth->fetch())
		    {

		      print("<br><br><br>");
		      print("<table>");
		      print("<tr>");
		      print("<th>Name</th>");
		      print("<th>Symbol</th>");
		      print("<th>Atomic Number</th>");
		      print("<th>Atomic Weight</th>");
		      print("<th>Melting Point (Degrees Celsius)</th>");
		      print("<th>Boiling Point (Degrees Celsius)</th>");	      
		      print("<th>Density (g/cm3)</th>");
		      print("<th>Group Number</th>");
		      print("<th>Configuration</th>");
		      print("<th>Ionization Energy (eV)</th>");
		      print("<th>Charges</th>");
		      print("<th>Multivalent</th>");
		      print("<th>Phase (State)</th>");
		      print("<th>Atomic Radius</th>");
		      print("<th>Covalent Radius</th>");
		      print("<th>Electron Affinity</th>");
		      print("<th>Electronegativity</th>");
		      print("<th>Molar Volume</th>");    
		      print("</tr><tr>");
		      print("<td>" . $row->name . "</td>");
		      print("<td>" . $row->symbol ."</td>");
		      print("<td>" . $row->atmnum ."</td>");
		      print("<td>" . $row->atmweight . "</td>");
		      print("<td>" . $row->melting . "</td>");
		      print("<td>" . $row->boiling . "</td>");
		      print("<td>" . $row->density . "</td>");
		      print("<td>" . $row->groupnum ."</td>");
		      print("<td>" . $row->configuration ."</td>");
		      print("<td>" . $row->ie . "</td>");
		      print("<td>" . $row->charge . "</td>");
		      print("<td>" . $row->valences . "</td>");
		      print("<td>" . $row->phase . "</td>");
		      print("<td>" . $row->ar ."</td>");
		      print("<td>" . $row->cr ."</td>");
		      print("<td>" . $row->ea . "</td>");
		      print("<td>" . $row->en . "</td>");
		      print("<td>" . $row->mv . "</td>");
		      print("</tr>");
		      print("</table>");
		}

	}
	    
	function abundanceoutput(&$sth, $str){
		$sth = $con->prepare("SELECT * FROM Abundance WHERE name = '$str' OR symbol = '$str'");
		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();
		 if($row = $sth)
		    {
		      print("<br><br><br>");
		      print("<table>");
		      print("<tr>");
		      print("<th>Name</th>");
		      print("<th>Symbol</th>");
		      print("<th>Average Mass</th>");
		      print("<th>Mass</th>");
		      print("<th>Abundance %</th>");
		      print("</tr>");
		      while($row = $sth->fetch())
			    {
			      print("<tr>");
			      print("<td>" . $row['name'] . "</td>");
			      print("<td>" . $row['symbol'] . "</td>");
			      print("<td>" . $row['avgweight'] . "</td>");
			      print("<td>" . $row['mass'] . "</td>");
			      print("<td>" . $row['abundance'] . "</td>");
			      print("</tr>");
			    }
		      print("</table>");
		 }

	}
	    
	    if (null!==("submit1") || null!==("submit2")) {

		$con = new PDO("mysql:host=localhost;dbname=Chemistry;charset=utf8",'colin','lego');
		if (!empty($_POST["search1"]) && !empty($_POST["search2"]))
		{
		    			    echo "In submitted both";

			$str = $_POST["search1"];
			$str1 = $_POST["search2"];

		    $sth = $con->prepare("SELECT * FROM Elements WHERE name = '$str' OR symbol ='$str' OR CAST(atmweight as CHAR) LIKE '$str1+`%`'");

		    $sth->setFetchMode(PDO:: FETCH_ASSOC);
		    $sth -> execute();

		    if($row = $sth)
		    {
		      echo "Have submitted both";

		      print("<br><br><br>");
		      print("<table>");
		      print("<tr>");
		      print("<th>Name</th>");
		      print("<th>Symbol</th>");
		      print("<th>Atomic Number</th>");
		      print("<th>Atomic Weight</th>");
		      print("<th>Melting Point (Degrees Celsius)</th>");
		      print("<th>Boiling Point (Degrees Celsius)</th>");	      
		      print("<th>Density (g/cm3)</th>");
		      print("<th>Group Number</th>");
		      print("<th>Configuration</th>");
		      print("<th>Ionization Energy (eV)</th>");
		      print("<th>Charges</th>");
		      print("<th>Multivalent</th>");
		      print("<th>Phase (State)</th>");
		      print("<th>Atomic Radius</th>");
		      print("<th>Covalent Radius</th>");
		      print("<th>Electron Affinity</th>");
		      print("<th>Electronegativity</th>");
		      print("<th>Molar Volume</th>");    
		      print("</tr>");
		      while($row = $sth->fetch()) {
			      print("<tr>");
			      print("<td>" . $row['name'] . "</td>");
			      print("<td>" . $row['symbol'] ."</td>");
			      print("<td>" . $row['atmnum'] ."</td>");
			      print("<td>" . $row['atmweight'] . "</td>");
			      print("<td>" . $row['melting'] . "</td>");
			      print("<td>" . $row['boiling'] . "</td>");
			      print("<td>" . $row['density'] . "</td>");
			      print("<td>" . $row['groupnum'] ."</td>");
			      print("<td>" . $row['configuration'] ."</td>");
			      print("<td>" . $row['ie'] . "</td>");
			      print("<td>" . $row['charge'] . "</td>");
			      print("<td>" . $row['valences'] . "</td>");
			      print("<td>" . $row['phase'] . "</td>");
			      print("<td>" . $row['ar'] ."</td>");
			      print("<td>" . $row['cr'] ."</td>");
			      print("<td>" . $row['ea'] . "</td>");
			      print("<td>" . $row['en'] . "</td>");
			      print("<td>" . $row['mv'] . "</td>");
			      print("</tr>");
			      print("</table>");
		    }

			    $sth = $con->prepare("SELECT * FROM Abundance WHERE name = '$str' OR symbol = '$str'");
			    $sth->fetch(PDO::FETCH_ASSOC);
			    $sth -> execute();
				 if($row = $sth)
				    {
				      print("<br><br><br>");
				      print("<table>");
				      print("<tr>");
				      print("<th>Name</th>");
				      print("<th>Symbol</th>");
				      print("<th>Average Mass</th>");
				      print("<th>Mass</th>");
				      print("<th>Abundance %</th>");
				      print("</tr>");
					  while($row = $sth->fetch())
					    {
					      print("<tr>");
					      print("<td>" . $row['name'] . "</td>");
					      print("<td>" . $row['symbol'] . "</td>");
					      print("<td>" . $row['avgweight'] . "</td>");
					      print("<td>" . $row['mass'] . "</td>");
					      print("<td>" . $row['abundance'] . "</td>");
					      print("</tr>");
					    }
				      print("</table>");
				 }
		    }
		   /* else
		    {
			    print("<br><br><br>");
			    echo "Name Does Not Match Either Table";
		    }  */

		}
		elseif (!empty($_POST["search1"]))
		{
		    $str = $_POST["search1"];

		    
		    elementsoutput($sth, $str);
		    abundanceoutput($sth, $str);

		}   
		elseif (!empty($_POST["search2"]))
		{
			$str = $_POST["search2"];
			$sth = $con->prepare("SELECT * FROM Elements WHERE CAST(atmweight as CHAR) LIKE '$str%'");

			 $sth->setFetchMode(PDO:: FETCH_OBJ);
			 $sth -> execute();
		    print("\nIn Submit2\n");


		    if($row = $sth->fetch())
		    {
				    print("\nIn Submit2 Searching\n");


		      print("<br><br><br>");
		      print("<table>");
		      print("<tr>");
		      print("<th>Name</th>");
		      print("<th>Symbol</th>");
		      print("<th>Atomic Number</th>");
		      print("<th>Atomic Weight</th>");
		      print("<th>Melting Point (Degrees Celsius)</th>");
		      print("<th>Boiling Point (Degrees Celsius)</th>");	      
		      print("<th>Density (g/cm3)</th>");
		      print("<th>Group Number</th>");
		      print("<th>Configuration</th>");
		      print("<th>Ionization Energy (eV)</th>");
		      print("<th>Charges</th>");
		      print("<th>Multivalent</th>");
		      print("<th>Phase (State)</th>");
		      print("<th>Atomic Radius</th>");
		      print("<th>Covalent Radius</th>");
		      print("<th>Electron Affinity</th>");
		      print("<th>Electronegativity</th>");
		      print("<th>Molar Volume</th>");    
		      print("</tr><tr>");
		      print("<td>" . $row->name . "</td>");
		      print("<td>" . $row->symbol ."</td>");
		      print("<td>" . $row->atmnum ."</td>");
		      print("<td>" . $row->atmweight . "</td>");
		      print("<td>" . $row->melting . "</td>");
		      print("<td>" . $row->boiling . "</td>");
		      print("<td>" . $row->density . "</td>");
		      print("<td>" . $row->groupnum ."</td>");
		      print("<td>" . $row->configuration ."</td>");
		      print("<td>" . $row->ie . "</td>");
		      print("<td>" . $row->charge . "</td>");
		      print("<td>" . $row->valences . "</td>");
		      print("<td>" . $row->phase . "</td>");
		      print("<td>" . $row->ar ."</td>");
		      print("<td>" . $row->cr ."</td>");
		      print("<td>" . $row->ea . "</td>");
		      print("<td>" . $row->en . "</td>");
		      print("<td>" . $row->mv . "</td>");
		      print("</tr>");
		      print("</table>");
		    }
		    else
		    {
			    print("<br><br><br>");
			    echo "Name Does Not Match Submit2 Table";
		    }
		}
	      else
		{
			echo "You need to fill in a feild";
		}

	    }
?>
  </body>
</html>
