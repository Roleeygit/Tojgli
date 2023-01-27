# <p align = "center">__Verzió követő:__</p>

## Itt találhatóak a módositások verzióról verzióra. 

### Információ a verziók vezetéséről:

``` 
A verzió követő működése: 
kezdeti verzió: V. 0.001

 ```

 Kisebb verziók esetén a projekt verziója egy számmal ugrik előrébb vagyis:
 ```
 V0.002
 ```

 Nagyobb verzió esetén egy tizedest ugrik előrébb vagyis:
```
V0.010
```

Kész Projekt esetén a Verziónak a száma egy százast ugrik, minden azutáni módositás az előbb leirtak szerint történik tovább.
```
V0.100
``` 
Évente a verzió szám egy százassal változik ha van változás. Ez 900-ig, majd utána V1.000 -val folytatódik.



<br></br>

# <p align = "center">Verzió Béta:</p>
- Projekt kezdete: 2022 nyara, ekkor készültek a tervek amiket a [Dia] , [Imgs] mappákba lehet megtalálni. (Ezek már a kibővitett verziók)

<br></br>

# <p align = "center">Verzió 0.001:</p>
Verzió kiadva: 2023-01-10

- Alap Migrációs fájlok előkészitése, legenerálása. Később ezek javitása, illetve az alap tervrajz javitása.
- Controllerrek legenerálása, Admin userhez a restapi elkészitése. 
- Modellek létrehozása, adatok eltárolása fillable-be
- Migrációk megirása, tesztelés, adatbázis eléréssel

<br></br>


# <p align = "center">Verzió 0.002:</p>
Verzió kiadva: 2023-01-13

- View nézet létrehozása a termékekhez, ami a kategóriák táblához is csatlakozik, majd emellé a Controller, Model, Route megirása.
- Kategória következő verzióra átitás: lehessen a kategóriát egy dropdown menüből kiválasztani név alapján az id beirása helyett az inputba

<br></br>

# <p align = "center">Verzió 0.003:</p> 
Verzió kiadva: 2023-01-18

- DB mappa létrehozva, benne tesztadatokkal amit az adatbázisba lehet tenni
- Kategória működés ellenőrzés, dropdown menüből működik a kiválasztott kategória név

<br></br>

# <p align = "center">Verzió 0.010:</p> 
Verzió kiadva: 2023-01-19

- Az id neveinek javitása a migrációkban, fixek a nevekkel, hogy működjön a 
- view fájl-ok adatainak probája (végül dropdown helyett option függvég használva)
- Profil Controllel létrehozása: Create+Store 
- Profil Modelljének kiegészitése + a hozzá tartozó midelleknek
- Termék listázó és Új termék nézet létrehozása
- Profilt felvevő nézet létrehozva(később át kell irni, hogy a payment_mode, delivery_mode, order_date  még ne kerüljön tárolásra, csak majd a vásárolnak az oldalról)
- Route a nézetekhez

<br></br>


# <p align = "center">Verzió 0.011:</p>
Verzió kiadva: 2023-01-20

- Teszt adat felvétele delivery, payment, customers táblába. 
- Profil kontroller átalakitása
- Login + Regisztráció kezelése a vásárlóknak (Későbre terv:CustomerController ahol mint a kettő tárolva lesz a külön szedés helyett)
- Home oldalon az eddigi nézetek elérése a elem segitségével
- Vásárlókhoz confirm_password hozzáadva 
- Regisztráció nézet létrehozása
- Adatvédelmi nyilatkozat + Általános szerződés későbbiekben frontenden lesz végül megoldva
- Route a regisztrációhoz


<br></br>


# <p align = "center">Verzió 0.020:</p>
Verzió kiadva: 2023-01-22

- Vásárlók kontroller megirása- restapi eléréshez, saját hibaüzenetekkel 
- Login, Regisztráció kontroller törlésre került, bele lett épitve a vásárlókhoz 
- Termékekhez saját hibaüzenet irása
- Insomnia json fájl exportálva, később ha bárhova vinni kell a projektet akkor a restapihoz ne kelljen előről felépiteni az insomniát
- Kernelbe vissza let rakva a nézet tiltása
- Vásárlók Resource fájl létrehozása A vásárlókhoz a könyebb tárolás és meghivás érdekében
- Termék Resource fájl létrehozása A vásárlókhoz a könyebb tárolás és meghivás érdekében
- Nézetben teszt a szerződés, nyilatkozat tárolásához (nem sikerült megoldani, később úgy döntöttünk ez frontenddel lesz megoldva)
- Api Route-ok létrehozása a felhasználókhoz, termékekhez
- Nézetek egyenlőre csak kikommentezve maradnak, későbbiekben hátha még lesz hasznuk


 <br></br>

# <p align = "center">Verzió 0.021:</p>
Verzió kiadva: 2023-01-23

- Felhasználóhoz új funkciók 
- Rendelésekhez kezdetleges kontroller lett készitve amivel majd ha a felhasználó vásárol akkor a payment_mode, delivery_mode, order_date rögzivte lesz
- Profil kontroller elkészitve
- Insomnia fájl új veriójának feltöltése

 <br></br>

# <p align = "center">Verzió 0.030:</p>
Verzió kiadva: 2023-01-26

- Profil kontroller megirva, működik az update, list
- Customers teljesen törölve, bele lett épitve a user-hez.
- Auth helyett User kontroller lett
- Felhasználó regisztrálásánál kap egy üres profil oldalt, amit majd login után módositani tud a saját adataival
- Új termék felvételével még gondok vannak, javitás remélhetőleg a következő verzióban
- Insomnia új verzió
- Útvonalak a fentebb irt módositások alapján szintúgy javitásra került
- DB alap adatokból kikerült a customers, mert már nem létezik ilyen tábla

 <br></br>

# <p align = "center">Verzió 0.031:</p>
Verzió kiadva: 2023-01-27

- Kategória működése kész
- githubra mostmár a commitokat Új verzió helyett a jelenlegi verzó számnak megfelelően rakom fel
<br></br>
Következő verzió: 
- categories, order_dates, payment_modes táblák teszt adattal feltöltése Controlleren keresztül