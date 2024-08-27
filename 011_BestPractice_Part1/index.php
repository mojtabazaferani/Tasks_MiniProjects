<?php

function arrayChange($array, $case = CASE_UPPER || CASE_LOWER)
{
    if($case === CASE_UPPER) {
        $keys = array_keys($array);

        $caseUpper = array_map('strtoupper', $keys);

        $values = array_values($array);

        return array_combine($caseUpper, $values);
    }

    elseif($case === CASE_LOWER) {
        $keys = array_keys($array);

        $caseLower = array_map('strtolower', $keys);

        $values = array_values($array);

        return array_combine($caseLower, $values);
    }
}

print_r(arrayChange(['mojtaba' => 1, 'milad' => 2], CASE_LOWER));

echo '</br>';

//========================================================

function missingNumber($array)
{
    $newArray = range($array[0], max($array));

    return array_diff($newArray, $array);
}

print_r(missingNumber([1,2,4,5,7]));

echo '</br>';

//========================================================

function hasSpace($string)
{
    if(preg_match('/ /', $string)) {
        return 'yes';
    }else {
        return 'no';
    }
}

echo hasSpace('  hello');

echo '</br>';

//========================================================

function removeNull($array)
{
    return array_values(array_filter($array));
}

print_r(removeNull(["a", null, "b", null]));

echo '</br>';

//========================================================

function getSumArr($array)
{
    return array_sum($array);
}

print_r(getSumArr([2,2]));

echo '</br>';

//========================================================

function alphabetSoup($string)
{
    $explode = str_split($string);

    sort($explode);

    return implode('', $explode);
}

print_r(alphabetSoup('mojtaba'));

echo '</br>';

//========================================================

function capMe($array)
{
    $trim = array_map('trim', $array);

    return array_map('ucfirst', $trim);
}

print_r(capMe([' ayda', ' mojtaba']));

echo '</br>';

//========================================================

function lastCapMe($array)
{
    $trim = array_map('trim', $array);

    return array_map(function($value) {
        $rev = strrev($value);

        $ucFirst = ucfirst($rev);

        return strrev($ucFirst);
    },$trim);
}

print_r(lastCapMe(['ayda', 'mojtaba']));

echo '</br>';

//========================================================

function delOdds($array)
{
    return array_filter($array, function ($value) {
        return $value % 2 === 0;
    });
}

print_r(delOdds([0,1,2,3,4,5,6,7,8,9]));

echo '</br>';

//========================================================

function oddsProduct($array)
{
    $odds = array_filter($array, function($value) {
        return $value % 2 === 1;
    });

    return array_product($odds);
}

print_r(oddsProduct([3,3]));

echo '</br>';

//========================================================

function removeEmptyOrNullOfArray($array)
{
    return array_filter($array, function($value) {
        return $value !== null && $value !== '' && $value !== ' ';
    });
}

print_r(removeEmptyOrNullOfArray([1, null, 2, '', 3, ' ']));

echo '</br>';

//========================================================

function multyProLen($array)
{
    return array_map(function($value) use ($array) {
        return $value * count($array);
    }, $array);
}

print_r(multyProLen([2,2,4,4]));

echo '</br>';

//========================================================

function sortNums($array)
{
    sort($array);

    return $array;
}

print_r(sortNums([80, 29, 4, -95, -24, 85]));

echo '</br>';

//========================================================

function setPrintLen($array, $lenght = 4)
{
    return array_filter($array, function($value) use ($lenght) {
        return strlen($value) === $lenght;
    });
}

print_r(setPrintLen(['moji', 'mojtaba', 'ayda', 'milad'], 7));

echo '</br>';

//========================================================

function delSpace($string)
{
    return preg_replace('/ /', '', $string);
}

echo delSpace('  m o j t a b a  ');

echo '</br>';

//========================================================

function formatPhoneNumber($array)
{
    $implode = implode('', $array);

    $pattern = $implode;

    $patternLenght = strlen($pattern);

    $randomPattern = '';

    for($i = 0; $i < $patternLenght; $i ++) {
        $randomPattern = $randomPattern . $pattern[rand(0, $patternLenght - 1)];
    }

    $len1 = substr($randomPattern, 1, 3);

    $len2 = substr($randomPattern, 4, 3);

    $len3 = substr($randomPattern, 6, 4);

    return '('. $len1 .') '. $len2 . '-' . $len3;
}

print_r(formatPhoneNumber([0,1,2,3,4,5,6,7,8,9]));

echo '</br>';

//========================================================

// define string
$string1 = "And all the king's men couldn't put him together again";

echo strtoupper($string1);

echo '</br>';

//========================================================

echo strtolower($string1);

echo '</br>';

//========================================================

// define string
$string3 = "moji";

echo ! isset($string3) || preg_replace('/ /', '', $string3) === '' ? 'Empty' : 'Not Empty';

echo '</br>';

//========================================================

// define string
$string4 = '0';

echo empty($string4) ? 'Empty' : 'Not Empty';

echo '</br>';

//========================================================

// define string
$string5 = "serendipity";

echo substr($string5, 6);

echo '</br>';

//========================================================

echo substr($string5, 0, -6);

echo '</br>';

//========================================================

// define string
$str2 = "Visa, MasterCard and American Express accepted";

echo strrev($str2);

echo '</br>';

//========================================================

// define string
$str3 = "ha ";

echo str_repeat($str3, 10);

echo '</br>';

//========================================================

// define long string
$str4 = "Just as there are different flavours of client-side scripting, there are different languages which can be used on the server as well.";

function truncatePrint($string, $maxChr = 40, $handle = '...')
{
    if(strlen($string) > $maxChr) {
        return trim(substr($string, 0, $maxChr)) . $handle;
    }else {
        return $string;
    }
}

echo truncatePrint($str4, 40, '<><><>');

echo '</br>';

//========================================================

// define character
$str5 = "\r";

echo ord($str5);

echo '</br>';

//========================================================

// define ASCII code
$asc = 65;

echo chr($asc);

echo '</br>';

//========================================================

for($i = 65; $i < 65 + 26; $i ++) {
    echo chr($i);
}

echo '</br>';

//========================================================

for($i = 97; $i < 97 + 26; $i ++) {
    echo chr($i);
}

echo '</br>';

//========================================================

// define string
$str6 = "The mice jumped over the cat, giggling madly as the moon exploded into green and purple confetti";

// define chunk size 
$chunkSize = 11;

print_r(str_split($str6, $chunkSize));

echo '</br>';

//========================================================

echo metaphone('sheep') === metaphone('ship') ? 'Strings are similar' : 'String are not Similar';

echo '</br>';

echo metaphone('fire') === metaphone('higher') ? 'Strings are similar' : 'String are not Similar';

echo '</br>';

echo metaphone('rest') === metaphone('reset') ? 'Strings are similar' : 'String are not Similar';

echo '</br>';

echo metaphone('mojtaba') === metaphone('milad') ? 'Strings are similar' : 'String are not Similar';

echo '</br>';

//========================================================

// define comma-separated list
$ingredientsStr = "butter, milk, sugar, salt, flour, caramel";

$toArray = explode(',', $ingredientsStr);

foreach($toArray as $values) {
    echo "Values => $values </br>";
}

echo '</br>';

//========================================================

// define URL
$url = "http://www.melonfire.com:80/community/columns/trog/article.php?id=79&page=2";

$parseUrl = parse_url($url);

foreach($parseUrl as $key => $value) {
    echo "$key => $value </br>";
}

echo '</br>';

//========================================================

// define string
$text = "Fans of the 1980 group will have little trouble recognizing the group's distinctive synthesized sounds and hypnotic dance beats, since these two elements are present in almost every song on the album; however, the lack of diversity and range is troubling, and I'm hoping we see some new influences in the next album. More intelligent lyrics might also help.";

echo str_word_count($text);

echo '</br>';

//========================================================

// define string
$text2 = "Fans of the 1980 group will have little trouble recognizing the group's distinctive synthesized sounds and hypnotic dance beats, since these two elements are present in almost every song on the album; however, the lack of diversity and range is troubling, and I'm hoping we see some new influences in the next album. More intelligent lyrics might also help.";

$words = preg_split('/[^0-9a-zA-Z\']+/', $text2, -1, PREG_SPLIT_NO_EMPTY);

print_r($words);

echo '</br>';

//========================================================

// define string
$str = "baA baA black sheep";

$str = trim($str);

$str = preg_replace('/[[:space:]]+/', ' ', $str);

$toArray = explode(' ', $str);

print_r($toArray);

echo '</br>';

//========================================================

// define string
$str = "Michael says hello to Frank. Frank growls at Michael. Michael feeds Frank a bone.";

$newStr = preg_replace('/Frank/', 'mojtaba', $str);

echo $newStr;

echo '</br>';

//========================================================

