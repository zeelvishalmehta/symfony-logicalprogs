# Symfony and PHP Exercise
 Code for Palindrome, Anagram and Pangram
 
<b>Technical Requirements</b><br><br>

    - PHP 7.3 or higher<br>
    - Install Composer using (https://getcomposer.org/download/), which is used to install PHP packages.<br>
    - Download Symfony using (https://symfony.com/download). This creates a binary called symfony that provides all the tools you need to develop and run your Symfony application locally.<br><br>
    
<b>Installation</b><br>

      1) Go to xampp/htdocs.
      2) Right click on htdocs open Gitbash cmd
      3) Using composer, create a new symfony project          
            - composer create-project symfony/skeleton symfony-project-name 
      4) Establish localhost to run symfony project using below command
           php -S 127.0.0.1:8000 -t public
      5) Run symfony project on browser using http://127.0.0.1:8000.    
      6) Setting up twig template.
           - First, set up Twig.
                $ composer require twig/twig
           - Install Twig with composer.
                $ mkdir templates
      7) Create checker.php file inside public folder and write logic for the Palindrome, Anagram and Pangram.
      8) Create program.html.twig inside templates folder to show the output.
      9) Check output through localhost on browser using http://127.0.0.1:8000/checker.php.
       
  <b>Note:</b> There is a below github url for reviewing the code for palindrome, anagram and pangram.<br>
                - https://github.com/zeelvishalmehta/symfony-logicalprogs/blob/main/public/checker.php<br>
                - https://github.com/zeelvishalmehta/symfony-logicalprogs/blob/main/templates/program.html.twig
    
