Wyświetla imieniny
==================

Instalacja
----------

Najlepiej za pomocą Composera:

    {
        "require": {
            ...
            "mikemix/mx-imieniny": "dev-master"
        }
    }

Wyświetlanie imienin
--------------------

Wersja szybka na dzisiaj:

    // alias na getTime()
    echo \mxImieniny\Service::getNow();
    
Dla unixtime:

    // alias na getByDateTime()
    echo \mxImieniny\Service::getTime(time());
    
Dla DateTime:

    // alias na getByDate
    echo \mxImieniny\Service::getByDateTime(new \DateTime());
    
Dla miesiąca i dnia:

    // brak aliasu
    echo \mxImieniny\Service::getByDate('01','31');
    
W przypadku błędnej daty wywali \InvalidArgumentException.
