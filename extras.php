
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
<!-- 		<div class="header"> -->
			<a href="index.html" class="logo">Raspberry Pi Makerspace</a>
			<div class="header-right">
				<a href="index.html">Home</a>
				<a href="contact.html">Contact</a>
				<a href="products.html">Products</a>
				<a class="active" href="extras.php">Other projects</a>
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
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label>Search By Element Name Or Symbol:</label> </td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="search1"></td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label></label> </td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="search2"> </td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label></label> </td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="search3"> </td>
			       </tr>
				<tr valign="TOP">
				    <td WIDTH="25%" align="RIGHT" valign="MIDDLE"> <label>Optional: Enter the number of moles</label> </td>
				    <td WIDTH="75%" align="LEFT" valign="TOP"><input type="text" name="moles"></td>
			       </tr>
			</TD></TR>
			<TR><TD>
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
                      print("<td>" . $row['abundance'] . "</td>");
                      print("</tr>");
                    }
        }
	
	function compound(&$sth){
		echo "\nIn compound.\n";
		$count = 1;
		while($row = $sth->fetch()) {
			$name[$count] = $row['name'];
			$charge[$count] = $row['charge'];
			$groupnum[$count] = $row['groupnum'];
			$count++;	
		}
		
		//Reduce like terms
		if (isset($charge[1]) && isset($charge[2])) {
			if ($charge[1] != $charge[2] && $charge[1] != 0 && $charge[2] != 0){
				if ($charge[1] > $charge[2]) {
					if ($charge[1] % $charge[2] == 0) {
						$charge[1] = $charge[1]/$charge[2];
					}
				}
				else {
					if ($charge[2] % $charge[1] == 0) {
						$charge[2] = $charge[2]/$charge[1];
					}
				}
			}
		}
		
		//Start naming string
		$binarynaming = "The binary compound created by the elements you entered is ";
		
		
		if ($groupnum[1] < $groupnum[2]) {
			$binarynaming .= "$name[1]";
			if ($charge[2] != 0) {
				$binarynaming .= "$charge[2] "; 
			}
			$binarynaming .= "$name[2]";
			if ($charge[1] != 0) {
				$binarynaming .= "$charge[1]"; 
			}
			$binarynaming = substr($binarynaming, 0, -3);
			$binarynaming .= "ide";
			echo "$binarynaming$charge[1].\n";
		}
		elseif ($groupnum[1] > $groupnum[2]) {
			$binarynaming .= " $name[2]";
			if ($charge[1] != 0) {
				$binarynaming .= " $charge[1] "; 
			}
			$binarynaming .= "$name[1]";
			if ($charge[2] != 0) {
				$binarynaming .= " $charge[2]"; 
			}
			$binarynaming = substr($binarynaming, 0, -3);
			$binarynaming .= "ide";
			echo "$binarynaming.\n";
		}
		elseif ($groupnum[1] == $groupnum[2]) {
			echo "Same group so no naming possible.";
		}
		else {
			echo "\nError : No compound...";
		}
	}
	
	function molarmass(&$sth, $moles) {
                $sumweight = 0;
		//Create search results
		$sth->setFetchMode(PDO:: FETCH_ASSOC);
                $sth -> execute();
		while($row = $sth->fetch()) {
			$sumweight += $row['atmweight'];
		}
		if ($moles != 1) {
			$sumweight *= $moles;
			echo "The mass of $moles moles of the element(s) that you entered is " . $sumweight . "g.\n";
		}
		else {
			echo "The sum of the two atomic weights is $sumweight.";
		}
	}
		

            if (null!==("submit")) {

                $con = new PDO("mysql:host=localhost;dbname=Chemistry;charset=utf8",'colin','lego');

                $searchString = "SELECT * FROM Elements WHERE ";
                $searchStringEmpty = $searchString;
                $abundanceString = "SELECT * FROM Abundance WHERE ";
		    
		//Initiate moles in case it isn't used
		$moles = 1;

                $str1 = $_POST["search1"];
                $str2 = $_POST["search2"];
                $str3 = $_POST["search3"];
		$moles = $_POST["moles"];
                $str4 = $_POST["search4"];
		$str5 = $_POST["search5"];
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
                        $searchString .= " name = '$str3' OR symbol ='$str3' OR";
                        $abundanceString .= " name = '$str3' OR symbol ='$str3' OR";
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
		    
                //Preparing default search
                $sth = $con->prepare("$searchString");
                $sth->setFetchMode(PDO:: FETCH_ASSOC);
                $sth -> execute();

        ?>

                <br><br>
		<CENTER>
                <h2>Information on Elements</h2>

         <?php
                createtable();
                elementsoutput($sth);
		molarmass($sth, $moles);


		if ($_POST["wantprint"] == "y") {
			//Preparing EN printing to the screen
			$sth = $con->prepare("$searchStringEN");
                	$sth->setFetchMode(PDO:: FETCH_ASSOC);
               		$sth -> execute();
			enoutput($sth);
		}
                print("</table>");
		    
		if (isset($str1) && isset($str2)) {
			$compoundsearchString = "SELECT * FROM Charges WHERE name = '$str1' OR symbol = '$str1' OR name = '$str2' OR symbol = '$str2'";
		        $sth = $con->prepare("$compoundsearchString");
                	$sth->setFetchMode(PDO:: FETCH_ASSOC);
                	$sth -> execute();
			compound($sth);
		}

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
	</CENTER>
  </body>
</html>
