<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$path = dirname(__DIR__).'/templates';
$loader = new FilesystemLoader($path);
$twig = new Environment($loader);

class checker
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters 
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome($word = '' ) : bool
    {
		$string = str_replace(' ', '', $word);

    	//remove special characters
    	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    	//change case to lower
    	$string = strtolower($string);

    	//reverse the string
    	$reverse = strrev($string);

    	if ($string == $reverse) {
        	return true;
   		 } 
    	
	return false;	
    }
    /**
     * An anagram is the result of rearranging the letters of a word or phrase 
     * to produce a new word or phrase, using all the original letters 
     * exactly once.
     * 
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(string $word, string $comparison) : bool
    {
        $word = str_replace(' ','',$word);
        $comparison = str_replace(' ','',$comparison);

		if (strlen($word) != strlen($comparison)) {
            // if not same size then they definitely aren't
            return false;
        }

        $word_chars = str_split($word);
        $comparison_chars = str_split($comparison);
        // sort them...
        sort($word_chars);
        sort($comparison_chars);

        // check if they're exactly the same...
        if($word_chars === $comparison_chars) {
            return true;
        }
        return false;
    }
    /**
     * A Pangram for a given alphabet is a sentence using every letter of the 
     * alphabet at least once. 
     * 
     * @param string $phrase
     * @return bool
     */    
    public function isPangram(string $phrase) : bool
    {
		$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');      
		
		$isPangram = false;

         $array = str_split($phrase);             

    foreach ($array as $char) {            

        	if (ctype_alpha($char)) {        
            if (ctype_upper($char)) {        
                $char = strtolower($char);

              }
    $key = array_search($char, $alphabet);
      
	 if ($key !== false) 
	 		{  
		 		unset($alphabet[$key]);
			}

         }

      }

    if (!$alphabet) {
        
            $isPangram = true;
        
        }
    return $isPangram;       

	}
}
$checker = new checker;
$palindromes = array('anna', 'Bark');
echo '<b><u> Palindrome Function Output:</u></b><br>';
foreach ($palindromes as $palindrome) {
   if($checker->isPalindrome($palindrome))
   {
    echo $twig->render('program.html.twig', ['palindrome' => $palindrome, 'palindromeresult' => 'true']);
   }
   else
   {
    echo $twig->render('program.html.twig', ['palindrome' => $palindrome, 'palindromeresult' => 'false']);
   }
}

$anagram_word = 'coalface';
$anagram_comparison = 'cacao elf';
echo "<b><u> Anagram Function Output:</u></b><br>";

if(($checker->isAnagram($anagram_word,$anagram_comparison)))
{
    echo $twig->render('program.html.twig', ['anagram'=> $anagram_word, 'comparison'=>$anagram_comparison,  'anagramresult' => 'true']);    
}
else
{
    echo $twig->render('program.html.twig', ['anagram'=> $anagram_word, 'comparison'=>$anagram_comparison, 'anagramresult' => 'false']);    
}

$anagram_word1 = 'coalface';
$anagram_comparison1 = 'dark elf';
if(($checker->isAnagram($anagram_word1,$anagram_comparison1)))
{
    echo $twig->render('program.html.twig', ['anagram'=> $anagram_word1, 'comparison'=>$anagram_comparison1,  'anagramresult' => 'true']);    
}
else
{
    echo $twig->render('program.html.twig', ['anagram'=> $anagram_word1, 'comparison'=>$anagram_comparison1, 'anagramresult' => 'false']);    
}

$pangrams = array('The quick brown fox jumps over the lazy dog', 'The British Broadcasting Corporation (BBC) is a British public service broadcaster.');
echo '<b><u> Pangram Function Output:</u></b><br>';
foreach ($pangrams as $pangram) {
    
    if(($checker->isPangram($pangram)))
    {
        echo $twig->render('program.html.twig', ['pangram' => $pangram, 'pangramresult' => 'true']);
    }
    else
    {
        echo $twig->render('program.html.twig', ['pangram' => $pangram, 'pangramresult' => 'false']);
    }
	 
}

?>