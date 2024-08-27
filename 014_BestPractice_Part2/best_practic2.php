<?php

//Code Challenges :

//1 : 

function arrayChangeKeyCase3(array $array,  $case = CASE_UPPER || CASE_LOWER)
{
    if($case === CASE_UPPER) {
        $keys = array_keys($array);

        $implode = implode(',', $keys);
    
        $upper = strtoupper($implode);
    
        $convert = explode(',', $upper);
    
        $values = array_values($array);
    
        $newArray = array_combine($convert, $values);
    
        return $newArray;
    }

    elseif($case === CASE_LOWER) {
        $keys = array_keys($array);

        $implode = implode(',', $keys);
    
        $upper = strtolower($implode);
    
        $convert = explode(',', $upper);
    
        $values = array_values($array);
    
        $newArray = array_combine($convert, $values);
    
        return $newArray;
    }

    else {
        return 'Unknown Parameter!!!';
    }
}

print_r(arrayChangeKeyCase3($input_array3, CASE_UPPER));

echo '</br>';

//========================================================

//2 :

/**
 * Print greetings.
 * @param string $name The name to greet.
 * @param string $greeting The greeting to print.
 *                          Defaults to 'Hello'.
 */

function greetings(string $name, string $greeting = 'Hello')
{
    echo "$greeting, $name!";
}

//========================================================

//3 :

/**
 * Print missingNumber.
 * @param array $array arraye shamele adad bashad.
 */

function missingNumber(array $array)
{
    $newArray = range($array[0], max($array));

    return array_diff($newArray, $array);
}

$input_array5 = [1, 2, 4, 6, 7, 8];

print_r(missingNumber($input_array5));

echo '</br>';

//========================================================

//4 :

function is_Power_of_three(int $number)
{
      $x = $number;
      while ($x % 3 == 0) {
      $x /= 3;
     }
       
	if($x == 1)
    {
		return "$number is power of 3";
    }
    else
    {
		return "$number is not power of 3";
    }
  
}

print_r(is_Power_of_three(9));

echo '</br>';

//========================================================

//5 :

function is_Power_of_four(int $number)
{
      $x = $number;
      while ($x % 4 == 0) {
      $x /= 4;
     }
       
	if($x == 1)
    {
		return "$number is power of 4";
    }
    else
    {
		return "$number is not power of 4";
    } 
}

print_r(is_Power_of_four(16));

echo '</br>';

//========================================================

//6 :

function hasSpace(string $string)
{
    return preg_match('/ /', $string);
}

print_r(hasSpace('hello '));

echo '</br>';

//========================================================

//7 :

function removeNull($arr) {
	return array_values(array_filter($arr));
}

print_r(removeNull(["a", null, "b", null]));

echo '</br>';

//========================================================

//8 :

function alphabetSoup(string $string)
{
    $convert = str_split($string);

    sort($convert);

    return $convert;

}

print_r(alphabetSoup('mojtaba'));

echo '</br>';

//========================================================

//9 :

function capMe(array $array)
{
  return array_map('ucfirst', $array);
}

$list = ['moji', 'mili'];

print_r(capMe($list));

echo '</br>';

//========================================================

//10 :

function delOdds(array $array)
{
    $filter = array_filter($array, function ($number) {
        return $number % 2 == 0;
    });

    return $filter;
}

// delOdds([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

print_r(delOdds([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));

echo '</br>';

//========================================================

//11 :

function oddsProduct(array $array)
{
    $filter = array_filter($array, function ($number) {
        return $number % 2 == 1;
    });

    $product = array_product($filter);

    return $product;
}

print_r(oddsProduct([1, 2, 3, 4, 5]));

echo '</br>';

//========================================================

//12 :

function removeEmptyArray(array $array)
{
    $filter1 = array_filter($array, function ($value) {
        return $value !== null;
    });

    $filter2 = array_filter($filter1, function ($value) {
        return $value !== '';
    });

    $filter3 = array_filter($filter2, function($value) {
        return $value !== ' ';
    });

    return $filter3;
}


print_r(removeEmptyArray([1, null, 2, null, 3, 4, null, 5, 6, '', 7, ' ', 8, ' ']));

echo '</br>';

//========================================================

//13 :

function doubleChars(string $string)
{
    $split = str_split($string);

    $unique = array_unique($split);

    $implode = implode('', $unique);

    return $implode;
}

print_r(doubleChars('sssaaalllaaammm'));

echo '</br>';

//========================================================

//14 :

function multyProLen(array $array)
{
    $map = array_map(function($number) use ($array) {
        return $number * count($array);
    }, $array);

    return $map;
}

print_r(multyProLen([2,2,3,4]));

echo '</br>';

//========================================================

//15 :

function sortNumbersAscending(array $array)
{
    $nums = $array;

    sort($nums);

    return $nums;
}

print_r(sortNumbersAscending([80, 29, 4, -95, -24, 85]));

echo '</br>';

//========================================================

//16 :

function isFourLetters(array $array)
{
    $filter = array_filter($array, function($value) {
        return strlen($value) === 4;
    });

    return $filter;
}

print_r(isFourLetters(['mojtaba', 'mili', 'maji', 'tannaz']));

echo '</br>';

//========================================================

//17 :

function delSpace(string $string)
{
    return trim($string);
}

echo delSpace("The film   starts       at      midnight. ");

echo '</br>';

//========================================================

//18 :

function formatPhoneNumber(array $array)
{
    $implode = implode('', $array);

    $stringSpace = $implode;

    $stringLength = strlen($stringSpace);

    $randomString = '';

    for($i = 0; $i < $stringLength; $i ++) {
        $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
    }

    $len1 = substr($randomString, 1, 3);

    $len2 = substr($randomString, 4, 3);

    $len3 = substr($randomString, 6, 4);

    return '('. $len1 .') '. $len2 . '-' . $len3;
}

print_r(formatPhoneNumber([0,1,2,3,4,5,6,7,8,9]));

echo '</br>';

//========================================================

//19 :

// define string
$string3 = " ";

// check if string is empty
// result: "Empty"
$result3 = ! isset($string3) || trim($string3) === "" ? 'Empty' : 'Not Empty';

echo $result3;
//OutPut => Empty

echo '</br>';

//========================================================

//20 :

// define string
$string4 = '0';

// check if string is empty
// result: "Empty"
$result4 =  empty($string4) ? 'Empty' : 'Not Empty';

echo $result4;
//OutPut => Empty

echo '</br>';

//========================================================

//21 :

// define string
$string5 = "serendipity";

// remove first 6 characters
// result: "ipity"
$result5 = substr($string5, 6);

echo $result5;
//OutPut => ipity

echo '</br>';

//========================================================

//22 :

// define string
$str1 = "serendipity";

// remove last 6 characters
// result: "seren"
$res1 = substr($str1, 0, -6);

echo $res1;
//OutPut => seren

echo '</br>';

//========================================================

//23 :

// define long string
$str4 = "Just as there are different flavours of client-side scripting, there are different languages which can be used on the server as well.";

// truncate and print string
// result: "Just as there are different flavours of..."

function truncateString(string $string, int $maxChr = 40, string $holder = "...")
{
    // check string length
    // truncate if necessary

    if(strlen($string) > $maxChr) {
        return trim(substr($string, 0, $maxChr)) . $holder;
    }else {
        return $string;
    }
}

$res4 = truncateString($str4);

echo $res4;
//OutPut => Just as there are different flavours of...

echo '</br>';

//========================================================

//24 :

// define character
$str5 = "\r";

// retrieve ASCII code
// result: 13
$res5 = ord($str5);

echo $res5;
//OutPut => 13

echo '</br>';

//========================================================

//25 :

// define ASCII code
$asc = 65;

// retrieve character 
// result: "A"
$char = chr($asc);

echo $char;
//OutPut => A

echo '</br>';

//========================================================

//26 :

// result: "abcd...xyz"
for ($a=97; $a<(97+26); $a++) { 
    echo chr($a); 
}

echo '</br>';

//========================================================

//27 :

// define string
$str6 = "The mice jumped over the cat, giggling madly as the moon exploded into green and purple confetti";

// define chunk size 
$chunkSize = 11;

// split string into chunks
// result: [0] = The mice ju [1] = mped over t [2] = he cat, gig [3] = gling madly ... //
$chunkedArr = str_split($str6, $chunkSize);

print_r($chunkedArr);

echo '</br>';

//========================================================

//28 :

// compare strings
// result: "Strings are similar"

echo (metaphone("rest") == metaphone("reset")) ? "Strings are similar" : "Strings are not similar";

echo '</br>';

// result: "Strings are similar"
echo (metaphone("deep") == metaphone("dip")) ? "Strings are similar" : "Strings are not similar";

echo '</br>';

// result: "Strings are not similar"
echo (metaphone("fire") == metaphone("higher")) ? "Strings are similar" : "Strings are not similar";

echo '</br>';

//========================================================

//29 :

// define URL
$url = "http://www.melonfire.com:80/community/columns/trog/article.php?id=79&page=2";

// parse URL into associative array
$data = parse_url($url);

foreach ($data as $key => $value) {
    echo "$key => $value </br>";
}

echo '</br>';

//========================================================

//30 :

// define string
$text = "Fans of the 1980 group will have little trouble recognizing the group's distinctive synthesized sounds and hypnotic dance beats, since these two elements are present in almost every song on the album; however, the lack of diversity and range is troubling, and I'm hoping we see some new influences in the next album. More intelligent lyrics might also help.";

// decompose the string into an array of "words"
$words = preg_split('/[^0-9a-zA-Z\']+/', $text, -1, PREG_SPLIT_NO_EMPTY);

print_r($words);

// count number of words (elements) in array
// result: "59 words"
echo count($words) . " words";

echo '</br>';

//========================================================

//31 :

// define string
$str = "baA baA black sheep";

// trim the whitespace at the ends of the string
$str = trim($str);

// compress the whitespace in the middle of the string
$str = preg_replace('/[[:space:]]+/', ' ', $str);

// decompose the string into an array of "words"
$words = explode(' ', $str);

$wordStats = [];
// iterate over the array
// count occurrences of each word
// save stats to another array
foreach ($words as $w) {
    array_push($wordStats, strtolower($w));
}

echo '</br>';

//========================================================

//32 :

// define string
$html = "I'm <b>tired</b> and so I <b>must</b> go <a href='http://domain'>home</a> now";

// replace all bold text with italics
// result: "I'm <i>tired</i> and so I <i>must</i> go <a href='http://domain'>home</a> now"
$newStr = preg_replace("/<b>(.*?)<\/b>/i", "<i>\\1</i>", $html);

echo $newStr;

echo '</br>';

//========================================================

//33 :

// define string
$str = "Michael says hello to Frank. Frank growls at Michael. Michael feeds Frank a bone.";

// replace all instances of "Frank" with "Crazy Dan"
$newStr = str_replace("Frank", "Crazy Dan", $str, $counter);

// print number of replacements
// result: "3 replacement(s)"
echo "$counter replacement(s)";

echo '</br>';

//========================================================

//34 :

// define string
$str = "apples and bananas and oranges and pineapples and lemons";

// define search pattern
$search = " and ";

// split string into array
$matches = explode($search, $str);

// count number of segments
$numMatches = sizeof($matches);

// extract substring preceding first match 
// result: "apples"
echo $matches[0];

// extract substring between first and fourth matches
// result: "bananas and oranges and pineapples"
echo implode($search, array_slice($matches, 1, 3));

// extract substring following last match
// result: "lemons"
echo $matches[$numMatches-1];

echo '</br>';

//========================================================

//35 :

//Using a Function as a Argument in Another Function :

function sum($value1, $value2)
{
    return $value1 + $value2;
};

function math(callable $function, $value1, $value2)
{
    return $function($value1, $value2);
}

echo math('sum', 2, 5);

echo '</br>';

//========================================================

//36 :

//Using Variables as Function, Familiarization With Closure :

$code = function($username){
	return "Let's Write some Code {$username} !";
};

echo $code("arMan");

echo '</br>';

//========================================================

//37 :

//Factorial Numbers :

function factorial($num = 2) {
	
	if($num < 0 OR !is_numeric($num))
	  return "invalid argument passed";
	else if ($num === 0 OR $num === 1)
	  return 1;
	
	$num = intval(floor($num));

	return $num * factorial($num - 1);
}

echo factorial(11); // 39916800

echo '</br>';

//========================================================

//38 :

//Convert Byte To MB :

$filename = "song.mp3";

$filesize_mb = filesize($filename) / 1048576;

echo "{$filesize_mb} MB";

echo '</br>';

//========================================================

//39 :

//Display String With Escape Sequence :

$content = 'hey \n rapid \t code \t';

echo $content;

echo '</br>';

//========================================================

//40 :

//Using Function in Double-Qoute"" :

function sayHello()
{
    return 'Hello, World';
}

$funToStr = "sayHello";

echo "{$funToStr()}";

echo '</br>';

//========================================================

//41 :

//Functional Coding :

$list = [2,5,6,9,14,89,45,27];

function get_odd($element){
	return $element & 1;
}

function get_even($element){
	return !($element & 1);
}

$odd_list = array_filter($list , "get_odd");

echo "odd: ";

print_r($odd_list);

$even_list = array_filter($list , "get_even");

echo "even: ";

print_r($even_list);

echo '</br>';

//========================================================

//42 :

function strReplace(string $sequence, string $oldValue, string $newValue)
{
	return preg_replace("/{$oldValue}/", $newValue, $sequence);
}

echo strReplace('hello, world', 'world', 'donya');

echo '</br>';

//========================================================

//43 :

$string = 'The lazy fox jumped over the fence';

function strEndsWith(string $sequence, string $pattern)
{
	if(str_ends_with($sequence, $pattern)) {
		return "The string ends with $pattern";
	}else {
		return "$pattern was not found because the case does not match";
	}
}

echo strEndsWith($string, 'mojtaba');

echo '</br>';

//========================================================

//44 :

function arrayCountValue(array $array)
{
	$i = 0;
	foreach($array as $value) {
		// echo "val => $value ";

		$i ++;
	}

	return $i;
}

print_r(arrayCountValue(['mojtaba', 'milad', 'sina', 'majid']));

echo '</br>';

//========================================================

//45 :

function arrayUnShift(array $array, array $values)
{
	return [...$values, ...$array];
}

print_r(arrayUnShift(['mojtaba', 'milad'], ['ayda',  'zahra']));

echo '</br>';

//========================================================

//46 :

function arrayFillKeys(array $keys, $value)
{
	$countKey = count($keys);

	$value = " $value ";

	$repeatValue = str_repeat($value, $countKey);

	$pregFilter = preg_split('/[^0-9a-zA-Z\']+/', $repeatValue);

	$filter = array_filter($pregFilter, function($value) {
		return $value !== '';
	});

	return array_combine($keys, $filter);

}

print_r(arrayFillKeys(['mojtaba', 'milad', 'ayda', 'zahra', 'feriyal'], 'PHP'));

echo '</br>';

//========================================================

//47 :

function arrayFill(int $start, int $end, $value)
{
	for($i = $start; $i <= $end; $i ++) {
		$newArray[$i] = $value;
	}
	
	return $newArray;
}

print_r(arrayFill(5, 9, 'php'));

echo '</br>';

//========================================================

//48 :

function arrayFlip(array $array)
{
	$countKey = count($array);

	for($i = 0; $i < $countKey; $i ++) {
		$newConvert[$i] = 'test';
	}

	$keys = array_keys($newConvert);

	return array_combine($array, $keys);
}

print_r(arrayFlip(['mojtaba', 'milad', 'ayda']));

echo '</br>';

//========================================================

//49 :

function arrayKeyExists($key, array $array)
{
	$keys = array_keys($array);

	if(in_array($key, $keys)) {
		return "The $key element is in the array";
	}else {
		return "The $key element is not in the array";
	}
}
print_r(arrayKeyExists('ayda', ['mojtaba' => 'ayda', 'milad' => 'zahra']));

echo '</br>';

//========================================================

//50 :

function powerNumber(int $base, int $power)
{
	return $base ** $power;
}

echo powerNumber(5, 3);

echo '</br>';

//========================================================

//51 :

function invert(array $array)
{
	return array_map(function($value) {
		if($value < 0) {
			return $value;
		}else {
			return $value * -1;
		}
	}, $array);
}

print_r(invert([1,-2,-3,-4,-5,6]));

echo '</br>';

//========================================================

//52 :

function convertStrToCamelCase(string $string)
{
		$toArray = str_split($string);

		if($toArray[0] === lcfirst($toArray[0])) {
			return 'harf aval kuchike';
		}else {
			$pattern = preg_split('/[^0-9a-zA-Z]+/', $string);

			$implode = implode(' ', $pattern);
		
			$ucWord = ucwords($implode);
		
			$lcFirst = lcfirst($ucWord);

			return $lcFirst;
		}
}

print_r(convertStrToCamelCase('the-stealth-warrior'));

echo '</br>';

//========================================================

//53 :

function delDefValOfArr(array $array, $value)
{
	return array_filter($array, function($val) use ($value) {
		return $val !== $value;
	});
}

print_r(delDefValOfArr(["Keep", "Remove", "Keep", "Remove", "Keep"], 'Remove'));

echo '</br>';

//========================================================

//54 :

function removeChr(string $string): string 
{
	return substr($string, 1, -1);
}

echo removeChr('mojtaba');

echo '</br>';

//========================================================

//55 :

function sortedMultyArray(array  $array1, array $array2, array $array3)
{
    $newArray = [...$array1, ...$array2, ...$array3];

    sort($newArray);

    return $newArray;
}

print_r(sortedMultyArray([3, 2, 1], [4, 6, 5], [9, 7, 8]));

echo '</br>';

//========================================================

//56 :

function greetMe(string $string)
{ 
    $toArray = str_split($string);

    if($toArray[0] === lcfirst($toArray[0])) {
        $toString = implode('', $toArray);

        return "Hello " . ucfirst($toString) . "!";
    }else {
        $toString = implode('', $toArray);

        $toLower = strtolower($toString);

        return "Hello " . ucfirst($toLower) . "!";
    }
}

print_r(greetMe('MOJTABA'));

echo '</br>';

//========================================================

//57 :

function solve(string $string)
{
    $split = str_split($string);

    $counterLower = 0;

    $counterUpper = 0;

    for($i = 0; $i < count($split); $i++) {
        if($split[$i] === strtolower($split[$i])) {
            $counterLower ++;

        }elseif($split[$i] === strtoupper($split[$i])) {
            $counterUpper ++;
        }
    }

    if($counterUpper > $counterLower) {
        return strtoupper($string);

    }elseif($counterUpper === $counterLower) {
        return strtoupper($string);

    }else {
        return strtolower($string);
    }
}

echo solve('MojtABa');

echo '</br>';

//========================================================

//58 :

function geometricSequence(int $start, int $step, int $end)
{
    $seq = [$start];
    for ($i = 1; $i < $end; ++$i) {
        $seq[] = $start *= $step;
    }
    
    return implode(', ', $seq);

}

print_r(geometricSequence(2, 3, 5));

echo '</br>';

//========================================================

//59 :

function descendingNumber($number)
{
    $array = str_split($number);

    rsort($array);

    return implode(' ', $array);
}

print_r(descendingNumber(42145));

echo '</br>';

//========================================================

//60 :

function countChr(string $string)
{
    $counter = array_count_values(str_split($string));

    $newArray = [];

    foreach($counter as $key => $value) {
        $newArray[] = [$key, $value];
    }

    return $newArray;
}

print_r(countChr('abracadabra'));

echo '</br>';

//========================================================

//61 :

function sortedMiddle($numbers)
{
    $array = str_split($numbers);

    $odds = array_filter($array, function($value) {
        return $value % 2 === 1;
    });

    rsort($odds);

    $even = array_filter($array, function($value) {
        return $value % 2 === 0;
    });

    sort($even);

    return implode(' ', $odds) . " " . implode(' ', $even);
}

print_r(sortedMiddle(123456789));

echo '</br>';

//========================================================

//62 :

function countSmileys(array $array) 
{
    $filter2 = array_filter($array, function($value) {
        if($value === ':)'){return $value;}

        elseif($value === ':D'){return $value;}

        elseif($value === ';-D'){return $value;}

        elseif($value === ':~)'){return $value;}
    });

    return count($filter2);
}

print_r(countSmileys([';]', ':[', ';*', ':$', ';-D']));

echo '</br>';

//========================================================

//63 :

function uniqueNumber(array $array)
{
    $newArray = [];

    foreach($array as $key => $value) {
        $newArray[$key] = strval($value);
    }

    $countValue =  array_count_values($newArray);

    $filter = array_filter($countValue, function($value) {
        return $value === 1;
    });

    $map = array_map(function($value) {
        return (int) $value;
    }, $filter);

    foreach($map as $key => $value) {
        return "This Is The Special Number : $key ";
    }
}

print_r(uniqueNumber( [0, 0, 0.55, 0, 0]));

echo '</br>';

//========================================================

//64 :

function calculateSquare(int $sides, $flag = 'AREA' || 'ENVIRONMENT')
{
        if($flag === 'AREA') {
            return $sides * $sides;

        }elseif($flag === 'ENVIRONMENT') {
            return $sides * 4;

        }else {
            return 'Invalid Parameter!!';
        }
}

echo calculateSquare(4, 'ENVIRONMENT');

echo '</br>';

//========================================================

//65 :

function wherePattern(array $array, string $pattern)
{
    if(in_array($pattern, $array)) {
        return array_search($pattern, $array);
    }else {
        return -1;
    }
}

echo wherePattern(["Bob", "Layla", "Kaitlyn", "Patricia"], 'moji');

echo '</br>';

//========================================================

//66 :

function secondLargest(array $array)
{
    rsort($array);

    return $array[1];
}

echo secondLargest([54, 23, 11, 17, 10]);

echo '</br>';

//========================================================

//67 :

//Make a Circle with OOP :

class Circle
{
    public $diameter;

    public $radius;

    public function getArea($radius)
    {
        $area = $radius * $radius * 3/14;

        return $area;
    }
}

$circle = new Circle();

echo $circle->getArea(11);

echo '</br>';

//========================================================

//68 :

function evenAndSumLastIndex(array $array)
{
    $even = array_filter($array, function($value) {
        return $value % 2 === 0;
    });

    $maxIndex = max($array);

    $newArray = [];

    foreach($even as $value) {
        $newArray[] = $value * $maxIndex;
    }

    return array_sum($newArray);
}

print_r(evenAndSumLastIndex([2, 3, 4, 5]));

echo '</br>';

//========================================================

//69 :

function splitCodes(string $string)
{
    $split1 = preg_split('/[^a-zA-Z]+/', $string, -1, PREG_SPLIT_NO_EMPTY);

    $split2 = preg_split('/[^0-9]+/', $string);

    return [...$split1, ...$split2];
}

print_r(splitCodes('TEWA8392'));

