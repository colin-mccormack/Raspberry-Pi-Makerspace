
<!DOCTYPE html>

<html>
	<head>
		<title>Extras</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div class="top">
			<div class="header">
				<a href="index.html" class="logo">Raspberry Pi Makerspace</a>
				<div class="header-right">
					<a href="index.html">Home</a>
					<a href="contact.html">Contact</a>
					<a href="products.html">Products</a>
					<a class="active" href="extras.php">Other projects</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div style="text-align:center">
				<h1>Extras</h1>
			</div>
		</div>
		<br>
		<br>
		<form method="post">
			<CENTER>
			<TABLE WIDTH="80%" BORDER=0>
			<TR><TD>
			    <HR><BR>
			    <table>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label>Search By Element Name Or Symbol And Quantity:</label> </td>
				    <td WIDTH="70%" align="LEFT" valign="TOP"><input type="text" name="search1"></td>
				    <td WIDTH="5%" align="RIGHT" valign="TOP"><input type="text" name="q1"></td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label></label> </td>
				    <td WIDTH="70%" align="LEFT" valign="TOP"><input type="text" name="search2"> </td>
				    <td WIDTH="5%" align="RIGHT" valign="TOP"><input type="text" name="q2"></td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label></label> </td>
				    <td WIDTH="70%" align="LEFT" valign="TOP"><input type="text" name="search3"> </td>
				    <td WIDTH="5%" align="RIGHT" valign="TOP"><input type="text" name="q3"></td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label>Optional: Enter the number of moles</label> </td>
				    <td WIDTH="5%" align="LEFT" valign="TOP"><input type="text" name="moles"></td>
			       </tr>
			</TD></TR>
			<TR><TD>
				<!--
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Search By Atomic Weight:</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="search4"></td>
				</tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Search By Group Number</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="search5"></td>
				</tr>
				<tr>
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Search By State</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><select name="formState"> <option>Select...</option> <option value="Solid">Solid</option> <option value="Liquid">Liquid</option> <option value="Gas">Gas</option> </select> </td>
				</tr>
				-->
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Order by Data</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><select name="formOrder"> <option>Select...</option> <option value="ar">Atomic Radius</option> <option value="ie">Ionization Energy</option> <option value="en">Electronegativity</option> <option value="ea">Electron Affinity</option> </select></td>
				</tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Order Direction</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"> <select name="formDirection"> <option>Select...</option> <option value="ASC">Ascending</option> <option value="DESC">Descending</option> </select> </td>
				</tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"><label>Electronegativity difference</label></td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"> <input type="radio" name="wantprint" value="y" checked>Yes</input> <input type="radio" name="wantprint" value="n">No</input></td>
			        </tr>
			</table>
			<br><br>
			<input type="submit" name="submit">
		</td></tr></table>
		</CENTER>
	</form>

<?php


	class elements {
		
		public $searchString = "";
		public $searchBuild = "False";
		private $searchResults;
		public $con;
		public $mysqlSearch;
		
		public function __construct($searchString) {
			$this -> searchString = $searchString;
			$this -> con = new PDO("mysql:host=localhost;dbname=Chemistry;charset=utf8",'viewChem','mysql');
			
			$this -> mysqlSearch = $this -> con -> prepare($this -> searchString);
			$this -> mysqlSearch -> setFetchMode(PDO:: FETCH_ASSOC);
			$this -> mysqlSearch -> execute();
		}
		
		public function createtable(){
			//Create headings for output
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

		public function elementsoutput(){
		//Print elements to the screen in looped array under titles
			
			//Setting a sepreate variable as the prepared search makes it easier since it is no longer treated as an object			
			$this -> searchBuild = "True";

			while($row = $this -> mysqlSearch -> fetch())  {
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
			print("</table>");
		}
		
		public function molarmass($moles, &$tempname, &$quantity) {
			
			//$this -> mysqlSearch -> setFetchMode(PDO:: FETCH_ASSOC);
                	$this -> mysqlSearch -> execute();
			$sumweight = 0;
						
			while($row = $this -> mysqlSearch -> fetch()) {
				for ($innercount = 0; $innercount < 3; $innercount++) {
					if ($row['name'] == $tempname[$innercount] || $row['symbol'] == $tempname[$innercount]) {
						$sumweight += $row['atmweight']*$quantity[$innercount];
					}
				}
			}

			if ($moles != 1) {
				$sumweight *= $moles;
				echo "The mass of $moles moles of the element(s) that you entered is " . $sumweight . "g.\n";
			}
			else {
				echo "The sum of the atomic weights is $sumweight.";
			}
		}
		
		public function enoutput(){
  
			//Set each variable(count1 is +1 so that their is a comparion and both will be incremented equally)
			$count = 1;

			//$this -> mysqlSearch -> setFetchMode(PDO:: FETCH_ASSOC);
                	$this -> mysqlSearch -> execute();
			
			while($row = $this -> mysqlSearch -> fetch()) {

				$en[$count] = $row['en'];
				$previous = $count-1;
				if (isset($en[$previous]) && isset($en[$count]) && !isset($diff)) {
					if ($en[$previous] > $en[$count]) {
						$diff = $en[$previous] - $en[$count];
						if ($diff<0.4) {
							print("\nThe bond is nonpolar and covalent.");
						}
						elseif($diff<1.7) {
							print("\nThe bond is polar and covalent.");
						}
						else {
							print("\nThe bond is Ionic.");
						}
						print("\nThe electronegativity difference is $en[$previous] - $en[$count] = $diff.\n");
					}
					elseif ($en[$previous] < $en[$count]) {
						$diff = $en[$count] - $en[$previous];
						if ($diff<0.4) {
							print("\nThe bond is nonpolar and covalent.");
						}
						elseif($diff<1.7) {
							print("\nThe bond is polar and covalent.");
						}
						else {
							print("\nThe bond is Ionic.");
						}
						print("\nThe electronegativity difference is $en[$count] - $en[$previous] = $diff.\n");
					}
					else {
						echo "No comparison possible.\n";
					}
				}
				$count++;
			}
		}
	}

        
		class abundance extends elements {

			public $abundaceSearchString = "";
			public $searchBuild = "False";
			private $abundanceSearchResults;
			private $row = "";
			public $mysqlSearchT2;

			public function __construct($abundaceSearchString) {
				$this -> abundaceSearchString = $abundaceSearchString;
				$this -> con = new PDO("mysql:host=localhost;dbname=Chemistry;charset=utf8",'viewChem','mysql');
			}

			function createAbundance() {
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

			function abundanceOutput() {
				
				$this -> mysqlSearchT2 = $this -> con -> prepare($this -> abundaceSearchString);

				$this -> mysqlSearchT2 -> execute();

				//Setting a sepreate variable as the prepared search makes it easier since it is no longer treated as an object
					
				while($row = $this -> mysqlSearchT2 -> fetch())
				    {
				      print("<tr>");
				      print("<td>" . $row['name'] . "</td>");
				      print("<td>" . $row['symbol'] . "</td>");
				      print("<td>" . $row['avgweight'] . "</td>");
				      print("<td>" . $row['abundance'] . "</td>");
				      print("</tr>");
				    }
				print("</table>");
			}
		}

	
		

            if (null!==("submit")) {

                $searchString = "SELECT * FROM Elements WHERE ";
                $searchStringEmpty = $searchString;
                $abundanceString = "SELECT * FROM Abundance WHERE ";
		    
		//Initiate moles in case it isn't used

                $str1 = $_POST["search1"];
                $q1 = $_POST["q1"];
                $str2 = $_POST["search2"];
                $q2 = $_POST["q2"];
                $str3 = $_POST["search3"];
                $q3 = $_POST["q3"];
                $str4 = $_POST["search4"];
		$str5 = $_POST["search5"];
                $str5 = $_POST["formState"];
                $str6 = $_POST["formOrder"];
                $str7 = $_POST["formDirection"];
		    
	    	$tempname = array("NULL", "NULL", "NULL");
		 
		$quantity = array(1, 1, 1);
		
	    	if (!empty($_POST["search1"])) {
			//Create search for either name or symbol in elements
                        $searchString .= " name = '$str1' OR symbol ='$str1' OR";
			$tempname[0] = $str1;

			if (!empty($q1)) {
				$quantity = array($q1, 1, 1);
			}
	
                        $abundanceString .= " name = '$str1' OR shortSymbol ='$str1' OR";
                }
                if (!empty($_POST["search2"])) {
                        $searchString .= " name = '$str2' OR symbol ='$str2' OR";
			$tempname[1] = $str2;
			
			if (!empty($_POST["q2"])) {
				$quantity[1] = $q2;
			}
		    	$abundanceString .= " name = '$str2' OR shortSymbol ='$str2' OR";
                }
                if (!empty($_POST["search3"])) {
                        $searchString .= " name = '$str3' OR symbol ='$str3' OR";
			$tempname[2] = $str3;
			
			if (!empty($_POST["q3"])) {
				$quantity[2] = $q3;
			}
		    $abundanceString .= " name = '$str3' OR shortSymbol ='$str3' OR";
                }
                if (!empty($_POST["search4"])) {
                        $searchString .= " CAST(atmweight as CHAR) LIKE '$str3%' OR";
                        $abundanceString .= " CAST(mass as CHAR) LIKE '$str3%' OR";
                }
                if (!empty($_POST["search5"])) {
                        $searchString .= " groupnum = '$str5' OR";
                }
                if (!empty($_POST["formState"]) && $str5 != "Select...") {
                        $searchString .= " phase = '$str5' OR";
                }

                //This removes the extra OR

                if ($searchString==$searchStringEmpty) {
                        $searchString = substr($searchString, 0, -7);
                        //Removes where clause if not needed
                        $searchStringEN = '';
                        //This stops it from printing tons of EN differences to the screen
                }
                else {
                        $searchString = substr($searchString, 0, -3);
                        $searchStringEN = $searchString;
                }

                if (!empty($_POST["formOrder"]) && $str6 != "Select...") {
                        if (!empty($_POST["formDirection"]) && $str7 != "Select...") {
                                if ($str6 == "en" || $str6 == "ie") {
					$searchString .= " ORDER BY `$str6` $str7";
				}
				else {
					$searchString .= " ORDER BY CAST($str6 AS UNSIGNED) $str7";
				}
                        }
                        elseif ($str6 == "en" || $str6 == "ie") {
				$searchString .= " ORDER BY `$str6` DESC";                       
			}
			else {
                                $searchString .= " ORDER BY CAST($str6 AS UNSIGNED) DESC";
			}
                }
		    
		if (isset($moles)) {
			$moles = $_POST["moles"];
		}
		else {
			//numeric fail-safe to avoid jibberjabber
			$moles = 1;
		}

        ?>

                <br><br>
		<CENTER>
                <h2>Information on Elements</h2>

         <?php
                //Preparing default search   
	    	$elementSearch = new elements($searchString);
	    	$elementSearch -> createtable();
	    	$elementSearch -> elementsoutput();
		 
	    	//Use moles and quantities of each to output atomic weight
		$elementSearch -> molarmass($moles, $tempname, $quantity);


		if ($_POST["wantprint"] == "y") {
			$elementSearch -> enoutput();
		}
		    
                ?>

                <br><br>
		<h2>Information on Isotopes</h2>

                <?php
		    
	    	//Prepare search for abundace
		$abundaceSearchString = substr($abundanceString, 0, -3);
                
		    
		$abundanceSearch = new abundance($abundaceSearchString);
	    	$abundanceSearch -> createAbundance();
	    	$abundanceSearch -> abundanceOutput();    


            }
	      else
		{
			echo "Error : You need to fill in a feild";
		}
	?>
	</CENTER>
  </body>
</html>

