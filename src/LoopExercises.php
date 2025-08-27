<?php

/**
 * Cette classe contient un ensemble de fonctions à compléter qui vous permettront de vous entraîner à l'utilisation de boucles.
 * 
 * Pour chacune des fonctions pensez à écrire un pseudo-code qui vous permettra de réfléchir à la logique à implémenter.
 */
class LoopExercises
{
    /**
     * Calcule la somme des entiers de 0 jusqu'à n (inclus).
     *
     * Par exemple, pour n = 5, le résultat sera : 0 + 1 + 2 + 3 + 4 + 5 = 15
     * 
     * En cas de paramètre invalide, la fonction retourne -1
     *
     * @param int $n L'entier jusqu'auquel on effectue la somme (doit être positif ou nul)
     * @return int La somme des entiers de 0 à n
     */
    public static function sumUpTo(int $n): int
    {
        // TODO compléter la fonction avec une boucle for ou while

        // verifier que n est positif ou nul
        // si n est négatif
        //    retourner -1
        // sinon
        //    initialiser une variable somme à 0
        //    pour i allant de 0 à n (inclus)
        //        somme = somme + i
        //    retourner somme

        if ($n >= 0) {      
            $somme = 0;
            for ($i = 0; $i <= $n; $i++) {
                $somme += $i;
            }
            return $somme;
        }       

        return -1;
    }

    /**
     * Objectif :
     * Un Youtubeur compte 2500 abonnés sur sa chaîne.
     * Son contenu de qualité lui fait gagner 5% d'abonné.e.s en plus tous les mois.
     * 
     * Calcule une estimation du nombre d'abonnés après un certain nombre de mois
     * avec un taux de croissance mensuel donné en pourcentage.
     * 
     * Exemple : un youtubeur commence avec 2500 abonnés et gagne 5% chaque mois.
     * En 3 mois le nombre d'abonné atteindra 2 894 (résultat arrondi)
     * 
     * Il vous est demandé de trouver une solution basé sur l'utilisation de boucle de votre choix
     * 
     * @param int $initialSubscribers Nombre initial d'abonnés
     * @param float $growthRate Taux de croissance mensuel en pourcentage (exemple : 5 pour 5%)
     * @param int $months Nombre de mois pour l'estimation
     * 
     * @return int Estimation du nombre d'abonnés après $months mois, arrondi au plus proche
     */
    public static function estimateSubscribers(int $initialSubscribers, float $growthRate, int $months): int
    {

        // nombre initial d'abonnés
        // taux de croissance mensuel en pourcentage
        // nombre de mois pour l'estimation
        // pour chaque mois
        //    nombre d'abonnés = nombre d'abonnés + (nombre d'abonnés * taux de croissance / 100)
        // retourner le nombre d'abonnés arrondi    

        $initialSubscribers = 2500;
        $growthRate = 0;
        $months = 0;
        $newSubscribers = $initialSubscribers;    
        for ($i = 0; $i < $months; $i++) {
            $newSubscribers = $newSubscribers + ($newSubscribers * $growthRate / 100);
        }       
        // Indice : pour arrondir un entier il vous est possible d'utiliser la fonction "round" (https://www.php.net/manual/en/function.round.php)
        return ($newSubscribers);
    }

    /**
     * Calcule et retourne la factorielle d’un nombre donné.
     * Exemple : factorial(5) retourne 120 (car 5 × 4 × 3 × 2 × 1)
     * Utiliser une boucle for.
     * 
     * Plus d'informations sur le factorielle : https://fr.wikipedia.org/wiki/Factorielle
     * 
     * Pensez à écrire le pseudo-code avant d'écrire la fonction PHP
     *
     * @param int $n Le nombre dont on veut calculer la factorielle
     * @return int La factorielle de $n
     */
    function factorial($n): int
    {
        // TODO : Utiliser une boucle for pour calculer la factorielle
        // si n < 0
        //    retourner -1 (la factorielle n'est pas définie pour les négatifs)
        // si n == 0
        //    retourner 1 (par définition 0! = 1)
        // sinon    
        //    initialiser une variable resultat à 1
        //    pour i allant de 1 à n (inclus)
        //        resultat = resultat * i
        //    retourner resultat 

        $resultat = 0;
        if ($n < 0) {
            return -1;
        }
        if ($n == 0) {
            return 1;
        }
        $resultat = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultat = $resultat * $i;
        }
        return $resultat;
    }

    /**
     * Retourne la somme des chiffres d’un nombre entier positif.
     * 
     * Exemple :
     * pour l'entier 123 la somme est 1 + 2 + 3 soit 6
     * 
     * Indice : utiliser une boucle "while"
     *
     * @param int $n Le nombre à analyser
     * @return int La somme de ses chiffres
     */
    public static function sumDigits(int $n): int
    {
        // variable qui contiendra le résultat
        $sum = 0;

        // tant que n est supérieur à 0
        //    récupérer le chiffre le plus à droite de n
        //    l'ajouter à sum
        //    supprimer le chiffre le plus à droite de n

        while ($n > 0) {
            $chiffre = $n % 10;
            $sum += $chiffre;
            $n = intdiv($n, 10);
        }       
        
        // Indice il est possible de retrouver le chiffre le plus à droite (par exemple 3 pour 123) en récupérant le reste de la divisio par 10
        // L'opérateur permettant de calculer le reste est le modulo (%)
        // Par exemple : 123 % 10 retourne 3
        // puis 12 % 10 retoure 2
        // ...

        return $sum;
    }
}
