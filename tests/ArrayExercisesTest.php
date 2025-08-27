<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/ArrayExercises.php';

class ArrayExercisesTest extends TestCase
{

    public function testSumAllElements()
    {
        $this->assertEquals(0, ArrayExercises::sumAllElements( []));
        $this->assertEquals(25, ArrayExercises::sumAllElements( [25]));
        $this->assertEquals(25, ArrayExercises::sumAllElements([5, 5, 5, 5, 5]));
    }

    public function testSumBetweenIndexes()
    {
        // Cas classique
        $this->assertEquals(50, ArrayExercises::sumBetweenIndexes([42, 12, 13, 25], 1, 3), "Échec : la somme entre les index 1 et 3 devrait être 50");

        // Index de début supérieur à l’index de fin
        $this->assertEquals(-1, ArrayExercises::sumBetweenIndexes([10, 20, 30], 2, 1), "Échec : devrait retourner -1 si l’index de début est supérieur à l’index de fin");

        // Index de fin au-delà de la taille du tableau
        $this->assertEquals(50, ArrayExercises::sumBetweenIndexes([10, 20, 30], 1, 5), "Échec : la somme devrait s’arrêter au dernier élément si l’index de fin dépasse le tableau");

        // Index de fin exactement à la fin du tableau
        $this->assertEquals(60, ArrayExercises::sumBetweenIndexes([10, 20, 30], 0, 2), "Échec : somme complète du tableau attendue");

        // Index de début égal à l’index de fin
        $this->assertEquals(30, ArrayExercises::sumBetweenIndexes([10, 20, 30], 2, 2), "Échec : la somme d’un seul élément devrait être l’élément lui-même");

        // Tableau vide
        $this->assertEquals(0, ArrayExercises::sumBetweenIndexes([], 0, 2), "Échec : la somme d’un tableau vide devrait être 0");

        // Un seul élément dans le tableau
        $this->assertEquals(5, ArrayExercises::sumBetweenIndexes([5], 0, 0), "Échec : la somme avec un seul élément devrait retourner cet élément");

        // Index de fin largement hors limites
        $this->assertEquals(100, ArrayExercises::sumBetweenIndexes([10, 20, 30, 40], 0, 10), "Échec : la somme devrait inclure tous les éléments jusqu’à la fin si l’index de fin est trop grand");
    }

    public function testGetOddValues()
    {
        // Cas normal avec mix de nombres pairs et impairs
        $this->assertEquals([1, 3, 5], ArrayExercises::getOddValues([1, 2, 3, 4, 5]), "Échec : devrait retourner uniquement les nombres impairs");

        // Cas avec que des nombres pairs
        $this->assertEquals([], ArrayExercises::getOddValues([2, 4, 6, 8]), "Échec : tableau ne contenant que des nombres pairs devrait retourner un tableau vide");

        // Cas avec que des nombres impairs
        $this->assertEquals([1, 3, 5], ArrayExercises::getOddValues([1, 3, 5]), "Échec : tableau contenant uniquement des impairs doit retourner le même tableau");

        // Cas tableau vide
        $this->assertEquals([], ArrayExercises::getOddValues([]), "Échec : tableau vide doit retourner un tableau vide");

        // Cas avec zéro uniquement
        $this->assertEquals([], ArrayExercises::getOddValues([0]), "Échec : zéro est pair donc doit être exclu");
    }

    public function testCompareArray()
    {
        $this->assertTrue(ArrayExercises::compareArray([1, 2, 3], [1, 2, 3]));
        $this->assertFalse(ArrayExercises::compareArray([1, 2], [1, 2, 3]));
        $this->assertFalse(ArrayExercises::compareArray([1, 2, 3], [3, 2, 1]));
    }

    public function testReverseArray()
    {
        $this->assertEquals([4, 3, 2, 1], ArrayExercises::reverseArray([1, 2, 3, 4]));
    }

    public function testSumNumbersAtOddIndex()
    {
        $this->assertEquals(6, ArrayExercises::sumNumbersAtOddIndex([1, 2, 3, 4]));
        $this->assertEquals(0, ArrayExercises::sumNumbersAtOddIndex([]));
    }

    public function testFindLongestString()
    {
        // Cas 1 : la plus longue chaîne est au milieu
        $this->assertEquals(1, ArrayExercises::findLongestString(["cat", "elephant", "dog"]), "Failed: longest string in the middle");

        // Cas 2 : la plus longue chaîne est en première position
        $this->assertEquals(0, ArrayExercises::findLongestString(["crocodile", "rat", "bear"]), "Failed: longest string first");

        // Cas 3 : la plus longue chaîne est en dernière position
        $this->assertEquals(2, ArrayExercises::findLongestString(["a", "two", "extraordinary"]), "Failed: longest string last");

        // Cas 4 : toutes les chaînes ont la même longueur
        $this->assertEquals(0, ArrayExercises::findLongestString(["abc", "def", "ghi"]), "Failed: all strings same length");

        // Cas 5 : chaînes vides et non vides mélangées
        $this->assertEquals(3, ArrayExercises::findLongestString(["", "a", "", "ab"]), "Failed: mix of empty and non-empty strings");

        // Cas 6 : toutes les chaînes sont vides
        $this->assertEquals(0, ArrayExercises::findLongestString(["", "", ""]), "Failed: all strings empty");

        // Cas 7 : un seul élément
        $this->assertEquals(0, ArrayExercises::findLongestString(["solo"]), "Failed: single element");

        // Cas 8 : tableau vide (selon comportement attendu : retour 0)
        $this->assertEquals(0, ArrayExercises::findLongestString([]), "Failed: empty array");
    }

    public function testAddArrays()
    {
        $a = [
            [1, 2],
            [3, 4]
        ];
        $b = [
            [5, 6],
            [7, 8]
        ];
        $expected = [
            [6, 8],
            [10, 12]
        ];
        $this->assertEquals($expected, ArrayExercises::addArrays($a, $b));
    }

    public function testSumOddLines()
    {
        $array = [
            [1, 2],
            [3, 4],
            [5, 6]
        ];
        $this->assertEquals(7, ArrayExercises::sumOddLines($array));
    }

    public function testSumDiagonalNumbers()
    {
        $array = [
            [1, 0, 0],
            [0, 2, 0],
            [0, 0, 3]
        ];
        $this->assertEquals(6, ArrayExercises::sumDiagonalNumbers($array));
    }

    public function testSumBordersNumbers()
    {
        $array = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];
        // 1+2+3+7+8+9 (bords horizontaux) + 4+6 (bords verticaux internes)
        $this->assertEquals(40, ArrayExercises::sumBordersNumbers($array));
    }

    public function testWordSearchFoundVertical()
    {
        $array = [
            ['e', 'f', 'b', 'l', 'p'],
            ['a', 'm', 'J', 'c', 'i'],
            ['i', 'v', 'A', 'k', 'p'],
            ['b', 'w', 'V', 's', 'q'],
            ['l', 'n', 'A', 'm', 'o']
        ];
        $expected = [[1, 2], [4, 2]]; // "JAVA" vertical
        $this->assertEquals($expected, ArrayExercises::wordSearch($array, "JAVA"));
    }

    public function testWordSearchNotFound()
    {
        $array = [
            ['a', 'b', 'c'],
            ['d', 'e', 'f'],
            ['g', 'h', 'i']
        ];
        $this->assertEquals([[-1, -1], [-1, -1]], ArrayExercises::wordSearch($array, "xyz"));
    }
}
