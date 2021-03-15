<?php

namespace App\Converter;
/**
 * convert Earth date and time to Mars
 */
class MarsConverter
{
    private const CURRENT_LEAP_SECONDS = 37;
    private const MTC_FORMAT = 'H:i:s';

    private $earthDate;

    public function __construct(\DateTime $earthDate)
    {
        $this->earthDate = $earthDate;
    }

    /**
     * Calculate Mars Sol Date (MSD)
     *
     * @return float
     */
    public function getMarsSolDate(): float
    {
        $seconds = $this->earthDate->getTimestamp();

        // Julian Date Universal Time
        $julianDateUT = 2440587.5 + ($seconds / 86400);

        // Julian Date Terrestrial Time
        $julianDateTT = $julianDateUT + (self::CURRENT_LEAP_SECONDS + 32.184) / 86400;

        return ($julianDateTT - 2405522.0028779) / 1.0274912517;
    }

   /**
    * Calculate Martian Coordinated Time (MTC)
    *
    * @return string
    */
    public function getMartianCoordinatedTime(): string
    {
        $marsSolDate = $this->getMarsSolDate();

        $martianHours = fmod((24 * $marsSolDate), 24);

        return gmdate(self::MTC_FORMAT, (int) floor($martianHours * 3600));
    }
}
