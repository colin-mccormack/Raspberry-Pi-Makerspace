
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
	  <div class="inputForm">
		  <div class="rowL">
			  <form method="post">
				<label>Search By Element Name Or Symbol</label>
				<input type="text" name="search1">
				<input type="text" name="search2">
				<br><br>
				<label>Search By Atomic Weight</label>
				<input type="text" name="search3">
				<br><br>
				<label>Search By Group Number</label>
				<input type="text" name="search4">
				<br><br>
				<label>Search By State</label>
				<select name="formState">
					 <option>Select...</option>
					 <option value="Solid">Solid</option>
					 <option value="Liquid">Liquid</option>
					 <option value="Gas">Gas</option>
				</select>
				<br><br>
				<label>Order by Data</label>
				<select name="formOrder">
					 <option>Select...</option>
					 <option value="ar">Atomic Radius</option>
					 <option value="ie">Ionization Energy</option>
					 <option value="en">Electronegativity</option>
				</select>
				<br><br>
				<label>Order Direction</label>
				<select name="formDirection">
					 <option>Select...</option>
					 <option value="ASC">Ascending</option>
					 <option value="DESC">Descending</option>
				</select>
				<br><br>
				<input type="submit" name="submit">
			</form>
		  </div>
		  <div class="rowR">
			<img src="version-periodic-table-elements.jpg" alt="Periodic Table from Encyclopedia Britannica" style="height: 300px; float: center;"/>
		  </div>
  
	    </div>
<?php
	function createtable(){

		      
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
	}
	    
	function elementsoutput(&$sth){
		
		while($row = $sth->fetch())
		    {
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
			}


	}
	    
	function enoutput(&$sth){
		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();
		$count = 1;
		$count2 = 0;
		
		while($row = $sth->fetch()) {
			$en[$count] = $row['en'];
			if (isset($en[$count]) && isset($en[$count2])) {
				if ($en[$count] > $en[$count2]) {
					$diff = $en[$count] - $en[$count2];
					if ($diff<0.4) {
						print("\nThe bond is nonpolar and covalent.");
					}
					elseif($diff<1.7) {
						print("\nThe bond is polar and covalent.");
					}
					else {
						print("\nThe bond is Ionic.");
					}
					print("\nThe electronegativity difference is $en[$count] - $en[$count2] = $diff.\n");
				}
				elseif ($en[$count] < $en[$count2]) {
					$diff = $en[$count2] - $en[$count];
					if ($diff<0.4) {
						print("\nThe bond is nonpolar and covalent.");
					}
					elseif($diff<1.7) {
						print("\nThe bond is polar and covalent.");
					}
					else {
						print("\nThe bond is Ionic.");
					}
					print("\nThe electronegativity difference is $en[$count2] - $en[$count] = $diff.\n");
				}
				else {
					echo "No comparison possible.\n";
				}
			}
		$count++;
		$count2++;
		}
		

	}	    
	    
	function createabundance(){
	      print("<br><br><br>");
	      print("<table>");
	      print("<tr>");
	      print("<th>Name</th>");
	      print("<th>Symbol</th>");
	      print("<th>Average Mass</th>");
	      print("<th>Mass</th>");
	      print("<th>Abundance %</th>");
	      print("</tr>");
	 }
	    
	function abundanceoutput(&$sth){
		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();
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
	}
	    
	    if (null!==("submit")) {

		$con = new PDO("mysql:host=localhost;dbname=Chemistry;charset=utf8",'colin','lego');
		    
		$searchString = "SELECT * FROM Elements WHERE ";
	    	$searchStringEmpty = $searchString;
		$abundanceString = "SELECT * FROM Abundance WHERE ";
		    
		$str1 = $_POST["search1"];
		$str2 = $_POST["search2"];
		$str3 = $_POST["search3"];
		$str4 = $_POST["search4"];
		$str5 = $_POST["formState"];
	    	$str6 = $_POST["formOrder"];
	    	$str7 = $_POST["formDirection"];
		    
		if (!empty($_POST["search1"])) {
			$searchString .= " name = '$str1' OR symbol ='$str1' OR";
			$abundanceString .= " name = '$str1' OR symbol ='$str1' OR";
		}
		if (!empty($_POST["search2"])) {
			$searchString .= " name = '$str2' OR symbol ='$str2' OR";
			$abundanceString .= " name = '$str2' OR symbol ='$str2' OR";
		}
		if (!empty($_POST["search3"])) {
			$searchString .= " CAST(atmweight as CHAR) LIKE '$str3%' OR";
			$abundanceString .= " CAST(mass as CHAR) LIKE '$str3%' OR";
		}
		if (!empty($_POST["search4"])) {
			$searchString .= " groupnum = '$str4' OR";
		}
		if (!empty($_POST["formState"])) {
			$searchString .= " phase = '$str5' OR";
		}
		    
		$searchString = substr($searchString, 0, -3);
		//This removes the extra OR 
		    
	    	if ($searchString==$searchStringEmpty) {
			$searchString = substr($searchString, 0, -7);
			//Removes where clause if not needed
		}
		    
		if (!empty($_POST["formOrder"])) {
			if (!empty($_POST["formDirection"])) {
				$searchString .= " ORDER BY '$str6' $str7";
			}
			else {
				$searchString .= " ORDER BY '$str6' DESC";
			}
		}
		   echo $searchString;
		    
		$sth = $con->prepare("$searchString");

		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();

	?>
	    	
	    	<br><br>
	    	<h2>Information on Elements</h2>
	    	
	 <?php
		createtable();	
		elementsoutput($sth);
		enoutput($sth);
	        print("</table>");
		
		$abundanceString = substr($abundanceString, 0, -3);
		$sth = $con->prepare("$abundanceString");

		$sth->setFetchMode(PDO:: FETCH_ASSOC);
		$sth -> execute();
		    
	    	?>
	    
	    	<h2>Information on Isotopes</h2>
	    
	    	<?php
		createabundance();
		abundanceoutput($sth);
	        print("</table>");

	    }
		
	      else
		{
			echo "Error : You need to fill in a feild";
		}

?>
  </body>
</html>
