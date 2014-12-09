<?php
include('./header1.inc');
include('query.php');

$mode=0;
if(isset($_GET['individual_id']) && strlen($_GET['individual_id']) > 0) {
	$individual_id1 = $_GET['individual_id'];

}
if(isset($_GET['gene_name']) && strlen($_GET['gene_name']) > 0) {
	$gene_name1 = $_GET['gene_name'];
}

if(isset($_GET['trans_id']) && strlen($_GET['trans_id']) > 0){
	$mode=1;
}

if(isset($_GET['set_id']) && strlen($_GET['set_id']) > 0){
	$mode=2;
}

if(isset($_GET['name']) && strlen($_GET['name']) > 0){
	$mode=3;
}

$error_message = "No results found";
if($mode==0){
if($individual_id1 && $gene_name1) {
	require_once('../mysql_connect.php');

	$query = "SELECT genename, individual_id, multi_var_filt.trans_id, set_id, score FROM multi_var_filt LEFT JOIN transcript ON multi_var_filt.trans_id=transcript.trans_id WHERE individual_id LIKE \"$individual_id1%\" AND genename LIKE \"$gene_name1%\"";

	$result = @mysql_query($query); // Run the query.

	if(mysql_num_rows($result) == 0) {
		echo "<script type='text/javascript'>alert('$error_message');</script>";
	}
	elseif($result) { // If it ran OK, display the records.
		echo '<div id="results"><table border="2" align="center" cellspacing="3" cellpadding="5">
		<tr><td align="left"><b>Gene Name</b></td>
			<td align="left"><b>Individual Id</b></td>
			<td align="left"><b>Reference Transcript Sequence</b></td>
			<td align="left"><b>Set Id</b></td>
			<td align="left"><b>HMMvar Score</b></td></tr>';
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<tr><td align=\"left\"><a href=\"http://www.genecards.org/cgi-bin/carddisp.pl?gene=$row[0]\">$row[0]</a></td>
			<td align=\"left\">$row[1]</td>
			<td align=\"left\"><a href=\"results.php?trans_id=$row[2]\">$row[2]</a></td>
			<td align=\"left\"><a href=\"results.php?set_id=$row[3]&set_score=$row[4]\">$row[3]</a></td>
			<td align=\"left\">$row[4]</td></td>\n";
		}
		echo '</table></div>';
	}
} elseif($individual_id1) {
	require_once('../mysql_connect.php');

	$query = "SELECT genename, individual_id, multi_var_filt.trans_id, set_id, score FROM multi_var_filt LEFT JOIN transcript ON multi_var_filt.trans_id=transcript.trans_id WHERE individual_id LIKE \"$individual_id1%\"";

	$result = @mysql_query($query); // Run the query.

	if(mysql_num_rows($result) == 0) {
		echo "<script type='text/javascript'>alert('$error_message');</script>";
	}
	elseif($result) { // If it ran OK, display the records.
		echo '<div id="results"><table border="2" align="center" cellspacing="3" cellpadding="5">
		<tr><td align="left"><b>Gene Name</b></td>
			<td align="left"><b>Individual Id</b></td>
			<td align="left"><b>Reference Transcript Sequence</b></td>
			<td align="left"><b>Set Id</b></td>
			<td align="left"><b>HMMvar Score</b></td></tr>';
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<tr><td align=\"left\"><a href=\"http://www.genecards.org/cgi-bin/carddisp.pl?gene=$row[0]\">$row[0]</a></td>
			<td align=\"left\">$row[1]</td>
			<td align=\"left\"><a href=\"results.php?trans_id=$row[2]\">$row[2]</a></td>
			<td align=\"left\"><a href=\"results.php?set_id=$row[3]&set_score=$row[4]\">$row[3]</a></td>
			<td align=\"left\">$row[4]</td></td>\n";
		}
		echo '</table></div>';
	}
	else {
		echo '<p>Error in individual id search.</p>';
	}
} elseif($gene_name1) {
	require_once('../mysql_connect.php');
	$query = "SELECT genename, individual_id, transcript.trans_id, set_id, score FROM transcript LEFT JOIN multi_var_filt ON transcript.trans_id=multi_var_filt.trans_id WHERE genename LIKE \"$gene_name1%\"";
	$result = @mysql_query($query); // Run the query.
	if(mysql_num_rows($result) == 0) {
		echo "<script type='text/javascript'>alert('$error_message');</script>";
	}
	elseif($result) { // If it ran OK, display the records.
		echo '<div id="results"><table border="2" align="center" cellspacing="3" cellpadding="5">
		<tr><td align="left"><b>Gene Name</b></td>
			<td align="left"><b>Individual Id</b></td>
			<td align="left"><b>Reference Transcript Sequence</b></td>
			<td align="left"><b>Set Id</b></td>
			<td align="left"><b>HMMvar Score</b></td></tr>';
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<tr><td align=\"left\"><a href=\"http://www.genecards.org/cgi-bin/carddisp.pl?gene=$row[0]\">$row[0]</a></td>
			<td align=\"left\">$row[1]</td>
			<td align=\"left\"><a href=\"results.php?trans_id=$row[2]\">$row[2]</a></td>
			<td align=\"left\"><a href=\"results.php?set_id=$row[3]&set_score=$row[4]\">$row[3]</a></td>
			<td align=\"left\">$row[4]</td></td>\n";
		}
		echo '</table></div>';
	} else {
		echo "<p>Error in gene name search.</p>";
	}
} else {
	echo "<p>No gene name or individual id!</p>";
}
}
elseif($mode==1){
	$trans_id = $_GET['trans_id'];
	unset($_GET['trans_id']);
	require_once('../mysql_connect.php');
	$query = "SELECT genename, seq_cds, cds_location FROM transcript WHERE trans_id=\"$trans_id\"";
	$result = @mysql_query($query);
	if($result) {
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo '<div id="results">';
			echo "<p><b>Information on Gene: $row[0] with transcript id = $trans_id</b></p>";
			echo "<div id=\"container\"><p>Location=$row[2]</p>";
			echo "Sequence: ";
			echo "$row[1]";
			echo "</div>";
			echo "</div>";
			
		}
	} else {
		echo "<p><b>No results for trans_id = $trans_id</b></p>";
	}
}
elseif($mode==2){
	$set_id = $_GET['set_id'];
	$set_score = $_GET['set_score'];
	unset($_GET['set_score']);
	unset($_GET['set_id']);
	require_once('../mysql_connect.php');
	$query = "SELECT variant_name, trans_id, pos, mRNAref, mRNAalt, aaCode, cosmic_mid, score FROM variants_set LEFT JOIN var_cds_pos ON var_id = variant_name WHERE set_id=$set_id ORDER BY variant_name";
	$result = @mysql_query($query);
	if($result) {
		echo '<dir id="results">';
		echo '<table border="2" align="center" cellspacing="5" cellpadding=5">';
		echo "<tr><td colspan=8 align = center>Info for set_id=$set_id with score: $set_score</td</tr>";
		echo "<tr>
		<td align=\"left\">Variant names</td>
		<td align=\"left\">Transcript id</td>
		<td align=\"left\">Position</td>
		<td align=\"left\">mRNAref</td>
		<td align=\"left\">mRNAalt</td>
		<td align=\"left\">aaCode</td>
		<td align=\"left\">cosmic_mid</td>
		<td align=\"left\">Score</td>
		</tr>";
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<tr><td align=\"left\"><a href=\"results.php?name=$row[0]\">$row[0]</a></td>\n";
			echo "<td align=\"left\"><a href=\"results.php?trans_id=$row[1]\">$row[1]</a></td>\n";
			echo "<td align=\"left\">$row[2]</td>\n";
			echo "<td align=\"left\">$row[3]</td>\n";
			echo "<td align=\"left\">$row[4]</td>\n";
			echo "<td align=\"left\">$row[5]</td>\n";
			echo "<td align=\"left\">$row[6]</td>\n";
			echo "<td align=\"left\">$row[7]</td></tr>\n";

		}
		echo '</table>';
		echo '</dir>';
	} else {
		echo "<p><b>No results for set_id = $set_id</b></p>";
	}
}
elseif($mode==3){
	$var_name = $_GET['name'];
	unset($_GET['name']);
	require_once('../mysql_connect.php');
	$query = "SELECT variation_id, chrom, pos, ref, alt, qual, filter, info FROM variation WHERE name=\"$var_name\"";
	$result = @mysql_query($query);
	if($result) {
		echo '<div id="results">';
		echo '<table border="2" align="center" cellspacing="5" cellpadding=5">';
		echo "<tr><td colspan=10 align = center>Information for variant name = $var_name</td</tr>";
		echo "<tr>
		<td align=\"left\">Variation id</td>
		<td align=\"left\">chrom</td>
		<td align=\"left\">Position</td>
		<td align=\"left\">ref</td>
		<td align=\"left\">alt</td>
		<td align=\"left\">qual</td>
		<td align=\"left\">filter</td>
		<td align=\"left\">VT</td>
		<td align=\"left\">AA</td>
		<td align=\"left\">AF</td>
		</tr>";
		while($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<tr><td align=\"left\">$row[0]</td>\n";
			echo "<td align=\"left\">$row[1]</td>\n";
			echo "<td align=\"left\">$row[2]</td>\n";
			echo "<td align=\"left\">$row[3]</td>\n";
			echo "<td align=\"left\">$row[4]</td>\n";
			echo "<td align=\"left\">$row[5]</td>\n";
			echo "<td align=\"left\">$row[6]</td>\n";
			$vtLoc = strrpos($row[7], "VT=");
			$vtEnd = strpos($row[7], ";", $vtLoc);
			if($vtEnd) {
				$vt = substr($row[7], $vtLoc+3, $vtEnd - $vtLoc - 3);
			} else {
				$vt = substr($row[7], $vtLoc+3);
			}
			echo "<td align=\"left\">$vt</td>\n";
			$aaLoc = strrpos($row[7], "AA=");
			$aaEnd = strpos($row[7], ";", $aaLoc);
			if($aaEnd) {
				$aa = substr($row[7], $aaLoc+3, $aaEnd - $aaLoc - 3);
			} else {
				$aa = substr($row[7], $aaLoc+3);
			}
			echo "<td align=\"left\">$aa</td>\n";
			$afLoc = strrpos($row[7], "AF=");
			$afEnd = strpos($row[7], ";", $afLoc);
			if($afEnd) {
				$af = substr($row[7], $afLoc+3, $afEnd - $afLoc - 3);
			} else {
				$af = substr($row[7], $afLoc+3);
			}
			echo "<td align=\"left\">$af</td>\n";
			//echo "<td colspan=3 rowspan=2 align=\"left\">$row[7]</td></tr>\n";
			echo "</table>";
			echo "</div>";
		}
	} else {
		echo "<p><b>No results for variant name = $var_name</b></p>";
	}
} else {
	echo '<font color="red"><p>Error: no inputs.</p></font>';
}
include('./footer1.inc');
?>