<?php

/*
 * Build Your Own JSON API
 * By Pedroxam - Amoo Pedram
 * https://github.com/Pedroxam
*/

error_reporting(E_ALL);


/*
 * Comments On Output File
*/

$comments .= "";
$comments .= "/* \n This File Maked By Easy Json Api \n";
$comments .= " By Pedroxam - Amoo Pedram \n";
$comments .= " https://github.com/Pedroxam \n*/";


/*
 * Error on Output File
 * E_ALL or E_NOTICE or 0 for disable
*/

$error = 0;


/*
 * Function To Check is array Empty Or Not
*/
function is_array_empty($a)
{
	if(is_array($a)&&count($a)>0){
		foreach($a as $b){
			if(!empty($b)) return false; else return true;
		}
	}
}


/*
 * Build API
*/
if(isset($_POST['url'])) {
	
$name  = '';
$names = '';
$multi = '';
$patt  = '';
$arg   = '';

foreach(array('regex') as $val)
	if(!is_array_empty($_POST[$val])||$_POST[$val]=="")
	$values = $_POST[$val];

for ($x = 1; $x <= count($values); $x++) {
	$name 	  = $values[$x]['name'];
	$names   .= "\$field['$name'] = \$value$x;\n";
	$patt	  = $values[$x]['pattern'];
	$patt 	  = str_replace('"', '\"', $patt);
	$multi 	  = $values[$x]['multi'];
	if($multi=="on") {
		$arg .= "
		\$value$x = '';
		if(preg_match_all('$patt',\$source,\$match)){
			foreach(\$match[0] as \$val) {
				\$value$x .= \$val;
			}
		}";
	}
	else
	{
		$arg .= "
		if(preg_match('$patt',\$source,\$match)){
			\$value$x = \$match[0];
		}";
	}
}

if(!empty($_POST['client_url']))
{
	$method	 = $_POST['method'];
	foreach(array('method') as $val)
		if(!is_array_empty($_POST[$val])||$_POST[$val]=="")
			$methods = $_POST[$val];
			$method = $methods[1]['m'];
		$enter = "\$_{$method}['url']";

	if(!empty($_POST['auth']))
	{
		$auth = "
		
		if(empty(\$_{$method}['key'])) {
			exit( json_encode(array('msg' => 'Authentication Required')));
		}
		
		//Here You Can Enter Keys
		\$keys = array('123','ReplaceMe','',);
		
		if(!in_array(\$_{$method}['key'],\$keys)) {
			exit( json_encode(array('msg' => 'Authentication Problem')));
		}
		";
	}
	else
	{
		$auth = false;
	}
}
else
{
	$url = $_POST['url'];
	$enter = "'$url'";
}

// generate output file

$Json = "<?php

$comments

error_reporting($error);

$auth

\$source = file_get_contents(trim($enter));

$arg

\$field = array();

$names

echo json_encode(\$field);

?>";

$file = rand(time(),9999999999) . '_api.php';
header('Content-type: application/x-httpd-php');
header('Content-Disposition: attachment; filename='.$file);
ob_clean(); flush();
echo $Json;
exit();
}
else
{
	exit('What that ... !');
}