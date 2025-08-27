<?php

class StringExercises
{
    /**
     * Compte le nombre de caractères de la chaîne.
     * 
     * @param string $str Chaîne à traiter
     * @param string $c Caractère à compter (un seul caractère)
     * @return int Nombre de caractères comptés
     */
    public static function countChar(string $str, string $c): int
    {
        // Il est possible d'accéder à un caractère d'une chaîne en utilisant les crochets
        // Par exemple, pour la chaîne déclarée comme suit :
        // $test = "bonjour";
        // il est possible d'obtenir la première lettre ('b') avec la syntaxe $test[0]

        // une comparaison de caractères peut se faire avec l'opérateur === 
        // ainsi, il est possible d'utiliser $str[$i] === $c

        // déclarer une variable $count pour compter 
        // initialiser cette variable à 0
        // parcourir la chaîne $str avec une boucle
        // compter le nombre de caractères dans la chaîne $str
        // utiliser une boucle for et l'opérateur de comparaison ===
        // incrémenter la variable $count à chaque fois que le caractère est trouvé
        // retourner la variable $count

        $count = 0;

        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] === $c) {
                $count++;
            }
        }

        return $count;
    }


    /**
     * Compte le nombre de caractères minuscules.
     * 
     * @param string $str Chaîne à traiter
     * @return int Nombre de minuscules
     */
    public static function countLowerCase(string $str): int
    {
        // TODO trouver une solution en utilisant une boucle et l'utilisation d'une fonction telle que ctype_lower
        // (plus d'informations sur ctyp_lower ici https://www.php.net/manual/en/function.ctype-lower.php)

        $count = 0;

        for ($i = 0; $i < strlen($str); $i++) {
            if (ctype_lower($str[$i])) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Renvoie le miroir d'une chaîne.
     * 
     * Exemple :
     * pour la chaîne "bonjour" la fonction doit retourner la chaîne "ruojnob"
     * 
     * Il vous est demandé de trouvé une solution basée sur l'utilisation de boucles (et non pas une méthode PHP)
     * 
     * Pour construire une nouvelle chaîne de caractères, pensez à l'opérateur de concaténation (https://www.lephpfacile.com/cours/5-concatener-deux-chaines)
     * 
     * @param string $str Chaîne à traiter
     * @return string Chaîne en miroir
     */
    public static function mirrorString(string $str): string
    {

        // trouver le dernier caractère de la chaîne
        // le rajouter à une nouvelle chaîne
        // continuer avec l'avant dernier, etc.
        
        $result = "";
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $result .= $str[$i];
        }
        return $result;
    }

    /**
     * Insère une chaîne dans une autre.
     * 
     * Exemple :
     * pour les paramètres suivants
     * str = "Helloall"
     * toInsert = " and welcome, "
     * index = 5
     * 
     * nous donnerait "Hello and welcome, all"
     * 
     * Des cas particuliers sont à prévoir :
     * 1. index > longueur => ajout à la fin
     * 2. index négatif => renvoie la chaîne originale
     * 3. insertion en début de chaîne
     * 
     * @param string $str Chaîne à traiter
     * @param string $toInsert Chaîne à insérer
     * @param int $index Position d'insertion
     * @return string Nouvelle chaîne avec insertion
     */
    public static function insertString(string $str, string $toInsert, int $index): string
    {
        // Indice : en premier lieu vous pouvez créer une chaîne de caractères $result qui contiendra la chaîne finale

        // travailler avec des boucles "for" ou "while"

        $result = "";
        if ($index < 0) {
            return $str;
        } elseif ($index >= strlen($str)) {
            return $str . $toInsert;
        } else {
            for ($i = 0; $i < strlen($str); $i++) {
                if ($i == $index) {
                    $result .= $toInsert;
                }
                $result .= $str[$i];
            }
            return $result;
        }
    }

    /**
     * Vérifie si une chaîne est en camelCase.
     * 
     * @param string $str Chaîne à vérifier
     * @return bool true si camelCase, sinon false
     */
    public static function isCamelCaseCompliant(string $str): bool
    {
        // vérifier que le premier caractère est une minuscule
        // vérifier qu'il n'y a pas d'espaces
        // vérifier qu'il n'y a pas de caractères non alphanumériques
        // vérifier qu'il y a au moins une majuscule (sauf si la chaîne est d'une seule lettre)

        if (strlen($str) == 0) {
            return false;       
        } elseif (!ctype_lower($str[0])) {
            return false;       
        } elseif (preg_match('/[^a-zA-Z0-9]/', $str)) {
            return false;       
        } elseif (strpos($str, ' ') !== false) {
            return false;      
        } elseif (strlen($str) > 1 && !preg_match('/[A-Z]/', $str)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Convertit une chaîne en camelCase (sans caractères non alphanumériques).
     * Plus d'informations sur le camelCase : https://en.wikipedia.org/wiki/Camel_case
     * 
     * @param string $str Chaîne à transformer
     * @return string Chaîne transformée en camelCase
     */
    public static function camelCaseConverter(string $str): string
    {
        // vérifier qu'il y a au moins un caractère
        // mettre un espace avant chaque majuscule (sauf la première)

        $str = strtolower($str);
        $str = preg_replace('/[^a-zA-Z0-9]+/', ' ', $str);
        $mot = explode(' ', trim($str));
        for ($i = 1; $i < count($mot); $i++) {
            $mot[$i] = ucfirst($mot[$i]);
        }
        $str = implode('', $mot);
        return $str;
    }

    /**
     * Extrait une sous-chaîne d'une chaîne source donnée.
     * 
     * Cette fonction retourne la portion de chaîne comprise entre l'index de début `$start` et l'index de fin `$end` inclus.
     * 
     * Les index sont basés sur une numérotation commençant à 0.
     * 
     * Par exemple, pour la chaîne "Bonjour" :
     * - subString("Bonjour", 0, 2) retourne "Bon"
     * - subString("Bonjour", 2, 4) retourne "njo"
     * 
     * Si `$start` est supérieur à `$end` ou en dehors des bornes de la chaîne, la fonction devra renvoyer une chaîne vide.
     * 
     * Il vous est demandé de trouver une solution en utilisant des boucles et non pas des méthodes PHP natives.
     * 
     * @param string $str Chaîne source
     * @param int $start Index début
     * @param int $end Index fin (inclus)
     * @return string Sous-chaîne extraite
     */
    public static function subString(string $str, int $start, int $end): string
    {
        // vérifier que $start est inférieur ou égal à $end
        // vérifier que $start et $end sont dans les bornes de la chaîne
        // parcourir la chaîne de $start à $end et construire la sous-chaîne  
        // si $start > $end ou si $start est hors bornes, retourner une chaîne vide
        
        $result = "";
        for ($i = $start; $i <= $end; $i++) {
            if ($i < strlen($str)) {
                $result .= $str[$i];
            
            }
        }     
        if ($start > $end || $start < 0) {
            return "";
        }
        
        return $result;
    }

    /**
     * Vérifie si une chaîne contient une sous-chaîne, sans tenir compte de la casse.
     * 
     * @param string $str Chaîne à traiter
     * @param string $toLocate Sous-chaîne à chercher
     * @return bool true si contient, sinon false
     */
    public static function contains(string $str, string $toLocate): bool
    {
        return false;
    }

    /**
     * Vérifie si la chaîne est une phrase correcte (plusieurs mots, majuscule initiale, ponctuation finale).
     * 
     * @param string $str Chaîne à traiter
     * @return bool true si phrase correcte, sinon false
     */
    public static function checkIfCorrectSentence(string $str): bool
    {
        return false;
    }

    /**
     * Transforme une phrase en tableau de mots (sans ponctuation).
     * 
     * @param string $str Phrase à traiter
     * @return array Tableau de mots (string[])
     */
    public static function convertSentenceIntoArray(string $str): array
    {
        return [];
    }

    /**
     * Trouve tous les indices de début des sous-chaînes dans la chaîne.
     * 
     * @param string $str Chaîne source
     * @param string $toLocate Sous-chaîne à chercher
     * @return array Tableau d'entiers (indices)
     */
    public static function findSubStrings(string $str, string $toLocate): array
    {
        return [];
    }

    /**
     * Répète une chaîne avec un séparateur.
     * 
     * @param string $toRepeat Chaîne à répéter
     * @param int $repeatCount Nombre de répétitions
     * @param string $separator Séparateur entre répétitions (un caractère)
     * @return string Chaîne répétée
     */
    public static function repeatString(string $toRepeat, int $repeatCount, string $separator): string
    {
        return "";
    }

    /**
     * Convertit une chaîne RGB en tableau d'entiers.
     * 
     * @param string $toProcess Chaîne de la forme rgb(r,g,b)
     * @return array Tableau de 3 entiers
     */
    public static function rgbStringToIntArray(string $toProcess): array
    {
        return [0, 0, 0];
    }

    /**
     * Formate un numéro de téléphone en ajoutant un préfixe.
     * 
     * @param string $phoneNumber Numéro format classique
     * @param string $prefix Préfixe à ajouter
     * @return string Numéro formaté
     */
    public static function formatPhoneNumber(string $phoneNumber, string $prefix): string
    {
        return "";
    }
}
