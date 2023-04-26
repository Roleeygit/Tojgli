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


 <br></br>

# <p align = "center">Verzió 0.032:</p>
Verzió kiadva: 2023-01-29

- A category_id helyett category átnevezve, ez azért kell mert frontenden egy dropdownbol lehet majd kiválasztani a kategoriát, és nem az id, hanem a neve alapján lehet majd, igy az elnevezés nem korrekt
-  categories, order_dates, payment_modes táblák teszt adattal feltöltve, viszont migration alapján, nem Controlleren keresztül. Későbbiekben ha kell majd még adatot hozzá adni akkor majd lesz készitve Controller hozzá amiben hozzá lehet adni új adatokat (Ez azért szükséges, hogyha esetleg már ki lenne adva a projekt és úgy kerülne be egy új mondjuk kategória, akkor ne kelljen az összes táblát újra migrálni, ezzel ugye törlődik az összes adat belőlük, még a felhasználóké is)
- Teszt nézetek törlése, már frontenddel össze van kötve a RESTAPI, és a frontend oldalon teszteljük a működést egy külön ágon

 <br></br>

# <p align = "center">Verzió 0.033:</p>
Verzió kiadva: 2023-01-29

- Purchase Kontroller megcsinálva (Ha a felhasználó vásárol egy terméket akkor a profilhoz kerül mivel fizetett, a kiszállitás módja, és mikor tette mindezt)
- Order Kontroller helyett Purchase Kontroller, Order kontroller még a nézethez lett készitve, mostmár ez is felesleges, igy törölve lett
- order_dates tábla nem kell, törlésre került
- Profil modelnál felesleges már a usernek az információi, ugyanis automatikusan már generál hozzá egy profilt, igy ezeket az információkat nem kell megadni, és lekérni se
- Route készitése a vásárlás kezeléséhez
- Néhány helyen átnevezés
- Insomnia új verziója feltöltve ezek alapján

 <br></br>

# <p align = "center">Verzió 0.034:</p>
Verzió kiadva: 2023-01-31

- Termék módositásának metódusa megirva
- Route-ba az autentikáció használata: ezek a funkciók csak adminnak elérhetőek majd 
- Failed jobs tábla törölve a migrációk közül
- Felhasználó tábla új admin mezővel feltöltve, mellé a megfelelő javitások megcsinálva
- Adatbázis terv frissitve
- Insomnia új verzió

 <br></br>

# <p align = "center">Verzió 0.035:</p>
Verzió kiadva: 2023-02-02

- Profil törlésének metódusa megírva (Hogy törölni lehessen a Usert)
- Rossz forrásból volt hívva a profil módosítás, ezért az is át lett írva
- Image funkció működik a terméknél, el lehet tárolni a termékről a képet adatbázisba
- Adatbázis terv képének módosítása a kép hozzáadása miatt
- Profil listázásánál ki lett javítva egy hiba ami által nem jelent meg a rendelési idő ha annak értéke még nem volt deklarálva
- DB könyvtár törölve, a teszt adatok már migráción keresztül vannak beépítve az adatbázisba
- Product Resource-ban valamiért a request el volt választva amikor le lett generálva(Január 20), javítva lett
- Insomnia új verzió


 <br></br>

# <p align = "center">Verzió 0.036:</p>
Verzió kiadva: 2023-02-03

- Customer model törölve, már nincs rá szükség, ét lett alakitva: A user-hez lett téve
- Regisztrációnál az email a validátorban nem volt, a formátumhoz ez szükséges!
- Insomnia payment_mode, delivery_mode id helyett névvel kiválasztva (később frontenden ki lehessen választani dropdown menüből)
- Insomnia új verzió

 <br></br>

# <p align = "center">Verzió 0.037:</p>
Verzió kiadva: 2023-04-06

- Loginhoz hozzá lett adva validáció, hogy frontend számára ezt láthatóvá lehessen tenni

 <br></br>

 # <p align = "center">Verzió 0.040:</p>
Verzió kiadva: 2023-04-17

- Login metódus átirása, mostmár úgy működik, hogy ellenőrzi van-e ilyen email az adatbázisban, illetve mostmár nem kell az email és a felhasználó nevet is külön megadni, A filter_var függvénnyel ellenőrizzük, hogy az érték érvényes e-mail cím-e, és ha igen, akkor az email mezőt használjuk a belépéshez, ellenkező esetben a felhasználónév mezőt használjuk. Így a felhasználó e-mail címmel vagy felhasználónévvel is bejelentkezhet.
- Fejlesztői dokumentáció megirva backend részről
- Az admin jog adást mostantól csak admin személy adhatja ki. Az egyedüli adminok jelent pillanatban a webshop készitők


 <br></br>

 # <p align = "center">Verzió 0.041:</p>
Verzió kiadva: 2023-04-20

- User Login tovább kezelve, ellenőzri mostantól azt is, hogy mit ir be a felhasználó, és megnézi egyezik-e ez az adatbázisban eltárolt felhaználókkal. Ha nem, akkor hiba üzenetet kezel, amibel vagy a felhasználó/email kombóra panaszkodik, vagy a jelszóra. 

 <br></br>

 # <p align = "center">Verzió 0.042:</p>
Verzió kiadva: 2023-04-20

- Profilhoz hozzá kellett adni még egy metódust, ami azért felel, hogy kilistázzuk csak egy felhasználó profilját. 
- Insomnia új verzió

 <br></br>

 # <p align = "center">Verzió 0.043:</p>
Verzió kiadva: 2023-04-24

- Létre lett hozva egy új metódus ami megjeleniti a kategóriákat, ezzel majd új termék felvételénél kilistázza milyen kategóriák elérhetőek.
- Category Resource létrehozva, hogy csak a kategóriákat le tudjuk kérni az adatbázisból. 
- Új útvonal ehhez a metódushoz
- Insomnia új verzió

 <br></br>

 # <p align = "center">Verzió 0.044:</p>
Verzió kiadva: 2023-04-24

- Dokumentáció kibővítbe
- Id hozzá adva a kategóriához

 <br></br>

 # <p align = "center">Verzió 0.045:</p>
Verzió kiadva: 2023-04-26

- A kép felvétele át lett alakitva: A blob tipus helyett string lett, a kép útvonalát tárolja.
- A képet eltárolja a storage/app/public/images helyére, ahonnan le lehet azt kérni frontenden. 
- linkelve lett a tárhely ahova mentse: php artisan storage:link paranccsal