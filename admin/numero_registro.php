<?php

$license_table = "smclientes";
$database_name = "SMdatabase";

$length = 6;
$c1 = 0; 
$sc1 = 'S'; 
$c2 = 1; 
$sc2 = 'B'; 
$c3 = 3;
$sc3 = 'D';
$c4 = 3;
$sc4 = 'G';
$c5 = 3;
$sc5 = 'A';
$c6 = 1; 
$sc6 = 'A';

function valid_license($license) {
    global $database_name, $license_table;

    if (strrpos($license,' ') > 0) {
        return FALSE;
    } else {
        include('../conexion.php');
        $SQLquery = "SELECT login FROM $license_table WHERE login = '$license'";
        $result = mysql_query($SQLquery);
        if ($result && mysql_num_rows($result) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

if (!isset($length)) {
    $action = "load_defaults";
}

if (@$action == "load_defaults") {
    // this could be replaced by an included file with format preferences,
    // or you could set up multiple "templates" of preference formats here,
    // identified by the $tpl variable:

    if ($tpl == 1) {
        $length = 9;
        $f1 = "0|p";
        $f2 = "4|A";
        $f3 = "3|A";
        $f4 = "3|A";
        $f5 = "3|A";
        $f6 = "1|A";
        $f7 = "1|A";
        $f8 = "11|A";
        $f9 = "1|A";
    } else {    // default template
        $length = 6;
        $f1 = "0|L";
        $f2 = "4|A";
        $f3 = "3|A";
        $f4 = "3|A";
        $f5 = "3|A";
        $f6 = "1|A";
    }

    for ($i=1; $i <= $length; $i++) {
        $split = explode("|", ${"f".$i});
        ${"c".$i} = $split[0];
        ${"sc".$i} = $split[1];

        // echo "c".$i." = ". ${"c".$i} .", sc".$i." = ". ${"sc".$i} ."<br>";
    }

} elseif (@$action == "set_defaults") {
    // for writing preferences to file; not done here, but this would create the
    // $f# variables which form the $c# and $sc# variables when loaded.  just as
    // easy to set your preferences through the "template" section above.

    for ($i=1; $i <= $length; $i++) {

        ${"f".$i} = ${"c".$i} ."|". ${"sc".$i};
        // echo "f".$i." = ". ${"f".$i} ."<br>";

    }

} elseif (@$action == "add") {
    // this section is for if you have chosen to use a MySQL database for
    // logging the generated license numbers:

    $SQLquery = "INSERT INTO $license_table VALUES (NULL, '$license')";
    $result = mysql_db_query($database_name, $SQLquery);
    if (!$result) {
        echo("<p>Error Performing Query: ". mysql_error() ."</p>");
        exit();
    } else {
        echo "Registration #$license added to the database";
    }
}


$uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$lowercase = "abcdefghijklmnopqrstuvwxyz";
$all_letters = $uppercase.$lowercase;
$numbers = "0123456789";
$letters_and_numbers = $all_letters.$numbers;

$array = array (
  "0"  => array ("Same Character (Specify at right)", ""),
  "1"  => array ("All Letters & Numbers",             "$letters_and_numbers"),
  "2"  => array ("All Letters",                       "$all_letters"),
  "3"  => array ("Numbers",                           "$numbers"),
  "4"  => array ("Hyphen",                            "--"),
  "5"  => array ("Underscore",                        "__"),
  "6"  => array ("Uppercase Letters",                 "$uppercase"),
  "7"  => array ("Lowercase Letters",                 "$lowercase"),
  "8"  => array ("Uppercase Vowels",                  "AEIOUY"),
  "9"  => array ("Lowercase Vowels",                  "aeiouy"),
  "10" => array ("Uppercase Consonants",              "BCDFGHJKLMNPQRSTVWXZ"),
  "11" => array ("Lowercase Consonants",              "bcdfghjklmnpqrstvwxz")
);

// any other char's you want for the 'Same Character' option can be appended here, i.e. $array[1][1]."*^@!";
$all_string = $array[1][1];
for ($i=0; $i < strlen($all_string); $i++) {
    $char = substr($all_string, $i, 1);
    $all_array[] = $char;
}


$license = " ";    // a # with spaces will not pass the initial valid_license() check, forcing a # to be created
$invalid = TRUE;

while ($invalid) {
    $license = "";
    mt_srand((double)microtime()*1000000);

    for ($i=1; $i <= $length; $i++) {
        if (${"c".$i} != 0) {
            $string = $array[${"c".$i}][1];
            if ($string == "") { $string = $array[1][1]; }
            $license .= substr($string, mt_rand(0,strlen($string)-1), 1);
        } else {
            // means a 'same character' position was selected
            $license .= ${"sc".$i};
        }
    }

    if (valid_license($license)) {
        $invalid = FALSE;
    }
}


if ($length == 0) {
    $txt = "<p><b>Specify the Length of the desired Registration Number:</b></p>\n\n";
} else {
 
    $permutations = 1;
    for ($i=1; $i <= $length; $i++) {
        $this = ${"c".$i};    // temp variable
        if (($this == 0) || ($this == 4) || ($this == 5)) {
            // for 4 & 5 (hyphen & underscore), the array contains 2 of each to
            // avoid calculation errors on some systems, but there's really only 1
            $permutations = $permutations * 1;
        } else {
            $permutations = $permutations * strlen($array[$this][1]);
        }

    }     
}

$num_cuenta = $license;

?>