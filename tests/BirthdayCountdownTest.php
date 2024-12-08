<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Genioam\Birthday\BirthdayCountdown;

class BirthdayCountdownTest extends TestCase
{
    public function testDaysUntilBirthday()
    {
        // Crea un oggetto BirthdayCountdown per un compleanno (esempio: 25 dicembre)
        $birthday = new BirthdayCountdown('1990-12-25');
        
        // Calcola i giorni rimanenti al compleanno
        $daysUntilBirthday = $birthday->daysUntilBirthday();

        // Verifica che i giorni rimanenti siano un numero positivo
        $this->assertGreaterThan(0, $daysUntilBirthday);

        // Verifica che il valore restituito sia un intero
        $this->assertIsInt($daysUntilBirthday);
    }

    public function testBirthdayHasPassedThisYear()
    {
        // Crea un oggetto BirthdayCountdown per un compleanno già passato quest'anno (esempio: 1 gennaio)
        $birthday = new BirthdayCountdown('1990-01-01');
        
        // Calcola i giorni rimanenti al prossimo compleanno
        $daysUntilBirthday = $birthday->daysUntilBirthday();

        // Verifica che i giorni rimanenti siano un numero positivo
        $this->assertGreaterThan(0, $daysUntilBirthday);

        // Verifica che il valore restituito sia un intero
        $this->assertIsInt($daysUntilBirthday);
    }
}