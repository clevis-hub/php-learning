<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/BasicsExercises.php';

class BasicsExercisesTest extends TestCase
{
    public function testMealParticipationRate()
    {
        // Célibataire, sans enfant, salaire >= 1800
        $this->assertEquals(20, BasicsExercises::mealParticipationRate(2000, 0, true), "Échec : Célibataire sans enfant, salaire >= 1800");

        // Marié, sans enfant, salaire >= 1800
        $this->assertEquals(25, BasicsExercises::mealParticipationRate(2000, 0, false), "Échec : Marié sans enfant, salaire >= 1800");

        // Célibataire, 2 enfants, salaire >= 1800
        // taux initial 20% + 2 * 15% = 50% plafonné
        $this->assertEquals(50, BasicsExercises::mealParticipationRate(2000, 2, true), "Échec : Célibataire avec 2 enfants, salaire >= 1800, taux plafonné à 50");

        // Marié, 1 enfant, salaire < 1800
        $this->assertEquals(50, BasicsExercises::mealParticipationRate(1700, 1, false), "Échec : Marié avec 1 enfant, salaire < 1800");

        // Célibataire, 3 enfants, salaire < 1800
        $this->assertEquals(50, BasicsExercises::mealParticipationRate(1700, 3, true), "Échec : Célibataire avec 3 enfants, salaire < 1800, taux plafonné à 50");

        // Marié, 0 enfant, salaire < 1800
        $this->assertEquals(35, BasicsExercises::mealParticipationRate(1500, 0, false), "Échec : Marié sans enfant, salaire < 1800");

        // Cas limite : salaire = 1800
        $this->assertEquals(20, BasicsExercises::mealParticipationRate(1800, 0, true), "Échec : salaire = 1800, célibataire, 0 enfant");
    }

    public function testIsOdd()
    {
        $this->assertTrue(BasicsExercises::isOdd(1), "Échec : 1 est impair");
        $this->assertTrue(BasicsExercises::isOdd(-3), "Échec : -3 est impair");
        $this->assertFalse(BasicsExercises::isOdd(0), "Échec : 0 n'est pas impair");
        $this->assertFalse(BasicsExercises::isOdd(2), "Échec : 2 n'est pas impair");
        $this->assertFalse(BasicsExercises::isOdd(-4), "Échec : -4 n'est pas impair");
    }

    public function testIsEven()
    {
        $this->assertTrue(BasicsExercises::isEven(0), "Échec : 0 est pair");
        $this->assertTrue(BasicsExercises::isEven(2), "Échec : 2 est pair");
        $this->assertTrue(BasicsExercises::isEven(-4), "Échec : -4 est pair");
        $this->assertFalse(BasicsExercises::isEven(1), "Échec : 1 n'est pas pair");
        $this->assertFalse(BasicsExercises::isEven(-3), "Échec : -3 n'est pas pair");
    }
}
