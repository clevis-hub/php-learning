<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/LoopExercises.php';

class LoopExercisesTest extends TestCase {
    public function testSumUpTo()
    {
        // Cas simples
        $this->assertEquals(0, LoopExercises::sumUpTo(0), "La somme de 0 à 0 devrait être 0");
        $this->assertEquals(1, LoopExercises::sumUpTo(1), "La somme de 0 à 1 devrait être 1");
        $this->assertEquals(3, LoopExercises::sumUpTo(2), "La somme de 0 à 2 devrait être 3");
        $this->assertEquals(15, LoopExercises::sumUpTo(5), "La somme de 0 à 5 devrait être 15");
        $this->assertEquals(55, LoopExercises::sumUpTo(10), "La somme de 0 à 10 devrait être 55");
        $this->assertEquals(5050, LoopExercises::sumUpTo(100), "La somme de 0 à 100 devrait être 5050");
    }

    
        public function testEstimateSubscribers()
    {

        $this->assertEquals(2500, LoopExercises::estimateSubscribers(2500, 5, 0), "Après 0 mois, le nombre d'abonnés devrait rester 2500");
        $this->assertEquals(2625, LoopExercises::estimateSubscribers(2500, 5, 1), "Après 1 mois, le nombre d'abonnés devrait être 2625");
        $this->assertEquals(2756, LoopExercises::estimateSubscribers(2500, 5, 2), "Après 2 mois, le nombre d'abonnés devrait être 2756");
   
    }
    
    public function testSumDigits()
    {
        $this->assertEquals(6, LoopExercises::sumDigits(123));
        $this->assertEquals(0, LoopExercises::sumDigits(0));
    }
}
