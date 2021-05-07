<?php
class Modification
{
    private $noemp;
    private $modification;
    private $dateTime;
    private $date;
    private $time;
    private $year;

    /**
     * Get the value of noemp
     */
    public function getNoemp()
    {
        return $this->noemp;
    }

    /**
     * Set the value of noemp
     *
     * @return self
     */
    public function setNoemp($noemp)
    {
        $this->noemp = $noemp;

        return $this;
    }

    /**
     * Get the value of modification
     */
    public function getModification()
    {
        return $this->modification;
    }

    /**
     * Set the value of modification
     *
     * @return self
     */
    public function setModification($modification)
    {
        $this->modification = $modification;

        return $this;
    }

    /**
     * Get the value of dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the value of dateTime
     *
     * @return self
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return self
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }
}
