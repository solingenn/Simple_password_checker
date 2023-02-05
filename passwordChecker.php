<?php

function passwordChecker($pass)
{
	// searching for integer in $pass string
	$match = preg_match('/\d/', $pass, $matches);

	// checking if $match returned true (int is found)
	// if not true; error will occur because $mathces array would be undefined
	if($match)
	{
		// searching for integers position in $pass string
		$intPosition = strpos($pass, $matches[0]);
	}

	if(strlen($pass) < 8)
	{
		return 'Password is too short, enter minimum 8 character!';
	} elseif(!preg_match('/[A-Z]/', $pass))
	{
		return 'Password must contain at least one uppercase letter!';
	} elseif(!preg_match('/\d/', $pass))
	{
		return 'Password must contain at least one number!';
	} elseif(!preg_match('/[^\da-zA-Z]/', $pass))
	{
		return 'Password must containg at least one special character (/*|\${}[] etc.)!';
	}elseif($intPosition < 3 || $intPosition > (strlen($pass) - 4)) // Checking position of the 1st integer occurence
	{
		return 'Position of the 1st number must be after third character from the beginning or third '.
		       'character from the end of the password!';
	} 
	return 'Password is valid!';
}
