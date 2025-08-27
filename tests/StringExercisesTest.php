<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/StringExercises.php';

class StringExercisesTest extends TestCase
{
    public function testCountChar()
    {
        $this->assertEquals(2, StringExercises::countChar("banane", "a"));
        $this->assertEquals(0, StringExercises::countChar("test", "z"));
    }
    
    public function testCountLowerCase()
    {
        $this->assertEquals(5, StringExercises::countLowerCase("abcde"));
        $this->assertEquals(0, StringExercises::countLowerCase("ABCDE"));
    }

    public function testMirrorString()
    {
        $this->assertEquals("avajavaj", StringExercises::mirrorString("javajava"));
    }

    public function testInsertString()
    {
         // Cas 1 : insertion au milieu
        $this->assertEquals(
            'Hello and welcome, all',
            StringExercises::insertString('Helloall', ' and welcome, ', 5)
        );

        // Cas 2 : index > longueur => ajout à la fin
        $this->assertEquals(
            'Hello world',
            StringExercises::insertString('Hello', ' world', 100)
        );

        // Cas 3 : index négatif => renvoie la chaîne originale
        $this->assertEquals(
            'Hello',
            StringExercises::insertString('Hello', ' world', -1)
        );

        // Cas 4 : insertion en début de chaîne
        $this->assertEquals(
            'Hello world',
            StringExercises::insertString('world', 'Hello ', 0)
        );
    }

    public function testIsCamelCaseCompliant()
    {
        $this->assertTrue(StringExercises::isCamelCaseCompliant("camelCase"));
        $this->assertFalse(StringExercises::isCamelCaseCompliant("CamelCase"));
    }

    public function testCamelCaseConverter()
    {
        $this->assertEquals("nombreMaximum", StringExercises::camelCaseConverter("nombre maximum"));
        $this->assertEquals("helloWorld", StringExercises::camelCaseConverter("Hello, world!"));
    }

    public function testSubString()
    {
        // Cas normal : début à 0, fin à 2 -> "Bon"
        $this->assertEquals(
            'Bon',
            StringExercises::subString('Bonjour', 0, 2)
        );

        // Cas normal : milieu de chaîne
        $this->assertEquals(
            'njo',
            StringExercises::subString('Bonjour', 2, 4)
        );

        // Cas où start == end : extraction d'un seul caractère
        $this->assertEquals(
            'j',
            StringExercises::subString('Bonjour', 3, 3)
        );

        // Cas où start > end : chaîne vide attendue
        $this->assertEquals(
            '',
            StringExercises::subString('Bonjour', 4, 2)
        );

        // Cas où start est hors bornes négatif (optionnel selon implémentation)
        // Par exemple ici on teste qu'on obtient chaîne vide ou comportement défini
        $this->assertEquals(
            '',
            StringExercises::subString('Bonjour', -1, 2)
        );

        // Cas où end est hors bornes (plus grand que la longueur de la chaîne)
        // Selon l'implémentation, on peut s'attendre à ce que la sous-chaîne aille jusqu'à la fin
        $this->assertEquals(
            'jour',
            StringExercises::subString('Bonjour', 3, 100)
        );

        // Cas start et end à la limite (dernier caractère)
        $this->assertEquals(
            'r',
            StringExercises::subString('Bonjour', 6, 6)
        );

        // Cas start == end == 0 (premier caractère)
        $this->assertEquals(
            'B',
            StringExercises::subString('Bonjour', 0, 0)
        );
    }

    public function testContains()
    {
        $this->assertTrue(StringExercises::contains("Hello World", "hello"));
        $this->assertFalse(StringExercises::contains("Bonjour", "hello"));
    }

    public function testCheckIfCorrectSentence()
    {
        $this->assertTrue(StringExercises::checkIfCorrectSentence("Ceci est une phrase."));
        $this->assertFalse(StringExercises::checkIfCorrectSentence("une phrase sans majuscule."));
        $this->assertFalse(StringExercises::checkIfCorrectSentence("Phrase sans point"));
    }

    public function testConvertSentenceIntoArray()
    {
        $this->assertEquals(["J'aime", "les", "framboises"], StringExercises::convertSentenceIntoArray("J'aime les framboises."));
        $this->assertEquals(["Salut", "toi"], StringExercises::convertSentenceIntoArray("Salut toi !"));
    }

    public function testFindSubStrings()
    {
        $this->assertEquals([0, 5], StringExercises::findSubStrings("testXtestY", "test"));
        $this->assertEquals([], StringExercises::findSubStrings("abc", "z"));
    }

    public function testRepeatString()
    {
        $this->assertEquals("Bonjour#Bonjour#Bonjour", StringExercises::repeatString("Bonjour", 3, "#"));
        $this->assertEquals("", StringExercises::repeatString("Salut", 0, "-"));
    }

    public function testRgbStringToIntArray()
    {
        $this->assertEquals([255, 60, 19], StringExercises::rgbStringToIntArray("rgb(255,60,19)"));
        $this->assertEquals([0, 128, 255], StringExercises::rgbStringToIntArray("rgb(0,128,255)"));
    }

    public function testFormatPhoneNumber()
    {
        $this->assertEquals("+33752462352", StringExercises::formatPhoneNumber("07 52 46 23 52", "+33"));
        $this->assertEquals("0033752462352", StringExercises::formatPhoneNumber("07.52.46.23.52", "0033"));
    }
}