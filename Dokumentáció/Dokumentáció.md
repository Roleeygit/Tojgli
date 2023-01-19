# Eggshop dokumentáció

## A Eggshop programról

Az Eggshop egy olyan webes alkalmazás ami egy Webshophoz készült és ennek a segítségével felvehetünk, szerkeszthetünk, illetve törölhetünk termékeket.
Elsősorban olyan felhasználoknak készült akik szeretnének különleges tojásokhoz jutni, hiszen a webshopunkban nem mindennapi tojások vannak.  

## Követelmények

* Telepítve:
  * NodeJS
  * PHP
  
## Futási környezet

* A futtatáshoz szükség van a REST API szerver működéséhez. A REST API PHP alapú webszerveren futtatható, például Apache, Nginx, stb.
* A REST API számára szükséges egy adatbázis szerver. A következő adatbázis szerverekkel lett tesztelve:MySQL, MariaDB.
* A telefonos alkalmazáshoz valamilyen Android telefonra van szükség.

## Telepítés

A REST API és az adatbázis telepítése az api felhasználói dokumentációban található.

Letöltés után telepitenünk kell a függöségeket amik szükségesek az asztali inditáshoz. Ehhez szükségünk lesz a következő parancsokra: 
```console
php artisan composer install
 ``` 

 ```
 npm install
 ```

A telefonos alkalmazás telepítéséhez le kell tölteni az Androidos csomagot a telefonra, majd meg kell nyitni. A telepítés automatikusan végremegy.
