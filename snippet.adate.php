<?php
/*
** aDate - snippet
**
** example: [[aDate? &date=`[+pub_date+]` &alterDate=`[+createdon+]` &tpl=`news-date-Tpl` &monthFormat=`2` &Uppercase=`1` &lang=`en`]]
**
** template: chunk or @CODE
** &date or &alterDate parametre is required
**
*/
	
if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}
if (!extension_loaded('mbstring') ) {die('Snippet aDate requires extention mbstring!');}

require_once ('assets/snippets/adate/classes/adate.class.php');
$aDate = new aDate();
$output = '';

$tpl = isset($tpl) ? $tpl : '@CODE:[+day+].[+month+].[+year+] [+hour+].[+minute+].[+second+]';
$template = $aDate->getTemplate($tpl);

/* Language parameter
** Format en, ru etc.
** default ru
*/
$lang = isset($lang) ? $lang : 'ru';

/* Uppercase parameter
** 0 - default
** 1 - first letter to uppercase
** 2 - all letters to uppercase
*/
$Uppercase = isset($Uppercase) ? $Uppercase : 0;

/* Month Format
** default is 1 - returns numeric value of the month
** 2 - returns the month name in format: 'January';
** 3 - returns the month name in short format: 'Jan';
*/
$monthFormat = isset($monthFormat) ? $monthFormat : 1;

$langPath = 'assets/snippets/adate/lang/';

$format = "%d.%m.%Y.%H.%M.%S";

if (!empty($date) && $date > 0)
	{
		$date = strftime($format,$date);
	}else{
		$date = strftime($format,$alterDate);
	}

$date = explode(".", $date);

$day =     $date[0];
$month =   $date[1];
$year =    $date[2];
$hour =    $date[3];
$minute =  $date[4];
$second =  $date[5];

/* Month Format and Translation*/
switch($monthFormat)
{
	case 2:
		require($langPath.$lang.'.php');
		$month = str_replace($numeric, $alfabetic, $month);
	break;
	case 3:
		require($langPath.$lang.'.php');
		$month = str_replace($numeric, $alfabetic_short, $month);
	break;
}

/* Uppercase*/
switch($Uppercase)
{
	/*First letter to uppercase*/
	case '1':
		$month = $aDate->ucfirst_utf8($month);
	break;
	/*All letters to uppercase*/
	case '2':
		$month = mb_strtoupper($month, 'utf-8');
	break;
}

$output = $modx->parseText($template, array( 
										'day' => $day, 
										'month' => $month, 
										'year' => $year, 
										'hour' => $hour, 
										'minute' => $minute, 
										'second' => $second
										), '[+', '+]' );
return $output;
?>
