<?php

//Functions with Arbitrary Number of Arguments
function printMultiple()
{
	$args = func_get_args();
	
	foreach ($args as $k => $v)
	{
		echo "arg" .($k+1). ":  $v\n"; 
	}
	
}

printMultiple('hello');
printMultiple('hello','how','are','you');

//Using Glob() to Find Files
$files = glob('../public_html/*.png');
print_r($files);

//Memory Usage Information
function memoryUsage()
{
	echo "Initial: ". memory_get_usage() ."bytes \n";
	
	for ($i = 0; $i < 100000; $i++)
	{
		$array[]=md5($i);
	}
	for ($i = 0; $i < 100000; $i++)
	{
		unset($array[$i]);
	}
	echo "Final" .memory_get_usage(). "bytes \n";
	echo "Peak: ".memory_get_peak_usage()." bytes \n";
}
print_r(memoryUsage());

//CPU Usage Information
print_r(getrusage());

//Magic Constants
function my_debug($msg, $line) 
{
	echo "Line $line: $msg\n";
}
my_debug("another debug message", __LINE__);

//Generating Unique ID's
echo uniqid(true);
echo uniqid('foo_');
echo uniqid('bar_',true);

//Serialization
$myvar = array
(
		'hello',
		42,
		array(1,'two'),
		'apple'
);
$string = serialize($myvar);
echo $string;

$newvar = unserialize($string);
print_r($newvar);

//Compressing Strings
$string =
"Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Nunc ut elit id mi ultricies
adipiscing. Nulla facilisi. Praesent pulvinar,
sapien vel feugiat vestibulum, nulla dui pretium orci,
non ultricies elit lacus quis ante. Lorem ipsum dolor
sit amet, consectetur adipiscing elit. Aliquam
pretium ullamcorper urna quis iaculis. Etiam ac massa
sed turpis tempor luctus. Curabitur sed nibh eu elit
mollis congue. Praesent ipsum diam, consectetur vitae
ornare a, aliquam a nunc. In id magna pellentesque
tellus posuere adipiscing. Sed non mi metus, at lacinia
augue. Sed magna nisi, ornare in mollis in, mollis
sed nunc. Etiam at justo in leo congue mollis.
Nullam in neque eget metus hendrerit scelerisque
eu non enim. Ut malesuada lacus eu nulla bibendum
id euismod urna sodales. ";

$compressed = gzcompress($string);

echo "Original size: ". strlen($string)."\n";
echo "Compressed size: ". strlen($compressed)."\n";

//Register Shutdown Function
$start_time = microtime(true);
register_shutdown_function('my_shutdown');
function my_shutdown() 
{
	global $start_time;

	echo "execution took: ".
			(microtime(true) - $start_time).
			" seconds.";
}
?>