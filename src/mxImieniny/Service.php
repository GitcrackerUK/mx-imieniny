<?php
namespace mxImieniny;

use DateTime;
use InvalidArgumentException;

class Service
{
    /** @var string */
    protected static $db;

    /** @var array */
    protected static $result;

    /**
     * @param string $month
     * @param string $day
     * @return       string
     * @throws \InvalidArgumentException
     */
    public static function getByDate($month, $day)
    {   
        return self::find($month, $day);
    }
    
    /**
     * @param \DateTime $date
     * @return          string
     * @throws \InvalidArgumentException
     */
    public static function getByDateTime(DateTime $date)
    {
        return self::find($date->format('m'), $date->format('d'));
    }
    
    /**
     * @param  int $time
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function getByTime($time)
    {
        return self::find(date('m', $time), date('d', $time));
    }
    
    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function getNow()
    {
        return self::getByTime(time());
    }
    
    /**
     * @param string $filePath 
     */
    public static function setDatabaseFile($filePath)
    {
        self::$db=$filePath;
    }
    
    /**
     * @param string $month
     * @param string $day
     * @return       string
     * @throws \InvalidArgumentException
     */
    protected static function find($month, $day)
    {
        if (isset(self::$result[$month.$day])) {
            return self::$result[$month.$day];
        }
    
        $fp=fopen(self::getDatabase(), 'r');
        while (! feof($fp)) {
            if (fgets($fp, 5) == $day.$month) {
                $line=str_replace(',', ', ', trim(fgets($fp, 500)));
                self::$result[$month.$day]=$line;

                fclose($fp);
                return $line;
            }
        }
        
        throw new InvalidArgumentException('Nie znaleziono imienin dla podanej daty');
    }
    
    /**
     * @return string
     */
    protected static function getDatabase()
    {
        if (! self::$db) {
            self::$db=__DIR__ . '/../data/imieniny.txt';
        }

        return self::$db;
    }
}
