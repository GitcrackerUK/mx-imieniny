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

    echo \mxImieniny\Service::getNow();
    
Dla unixtime:

    echo \mxImieniny\Service::getTime(time());
    
Dla DateTime:

    echo \mxImieniny\Service::getByDateTime(new \DateTime());
    
Dla miesiąca i dnia:

    echo \mxImieniny\Service::getByDate('01','31');
    
W przypadku błędnej daty wywali \InvalidArgumentException.
