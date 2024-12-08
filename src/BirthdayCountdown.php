<?php declare(strict_types=1);

namespace Genioam\Birthday;

use DateTime;

class BirthdayCountdown
{
    private $birthday;  // Data di compleanno (formato YYYY-MM-DD)

    // Costruttore che accetta una data di compleanno
    public function __construct($birthday)
    {
        // Inizializza la data di compleanno
        $this->birthday = new DateTime($birthday);
    }

    // Metodo per calcolare i giorni rimanenti fino al prossimo compleanno
    public function daysUntilBirthday(): int
    {
        $now = new DateTime(); // Ottieni la data 
        $currentYear = (int) $now->format('Y'); // Converti l'anno corrente in un intero

        // Estrai mese e giorno dalla data di compleanno
        $month = (int) $this->birthday->format('m');
        $day = (int) $this->birthday->format('d');

        // Imposta la data del compleanno per l'anno corrente
        $this->birthday->setDate($currentYear, $month, $day);

        // Se il compleanno è già passato calcoliamo il prossimo compleanno
        if ($this->birthday < $now) {
            $this->birthday->modify('+1 year');
        }

        // Calcola la differenza in giorni
        $interval = $now->diff($this->birthday);
        return $interval->days;
    }
}