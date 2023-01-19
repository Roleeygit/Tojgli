# Felhasználói dokumentáció

## Bevezetés

A zoldhum egy dolgozó nyilvántartó rendszer, amit REST API felületet biztosít.
A Laravel Framework 8.79.0 verzióval készült.

## Követelmények

* Telepítve:
  * NodeJS
  * PHP
  * Insomnia
* Parancsok:
  * php parancs
  * npm parancs

## Használatbavétel

```bash
git clone 'https://github.com/Roleeygit/Tojgli'
cd zoldhum
composer install
npm install
```

Lépések:

* Be kell állítani az adatbázist.
* Kulcsot kell generálni.

### Az adatbázis beállítása


Készítsünk másolatot a .env.example állományról .env néven:

```bash
cp .env.example .env
```

Állítsuk be az SQLite lehetőséget a .env fájlban.

Tegyük megjegyzésbe a következőt:

```txt
#DB_CONNECTION=mysql
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
```

A #DB_DATABASE=laravel helyen átirjuk a nevet a saját adatbázisunkra hogy ehhez csatlakozzon a projektünk.

```txt
#DB_DATABASE=egg
```

Generáljuk le az adatábzistáblákat:

```cmd
php artisan migrate
```

### Kulcs generálása

Kulcs generálása:

```cmd
php artisan key:generate
```

## Szerver indítása

```cmd
php artisan serve
```


## Felhasználó regisztrálása

| Végpont | Metódus |
|-|-|
| /api/register | POST |

A következő adatokat kell elküldenünk JSON formátumban:

```json
{
    "name": "valaki",
    "email": "valaki@zold.lan",
    "password": "titok",
    "password_confirmation": "titok"
}
```

## Belépés

| Végpont | Metódus |
|-|-|
| /api/login | POST |

Belépéshez a következő adatok szükségesek JSON formátumban:

```json
{
    "name": "valaki",
    "password": "titok"
}
```

Visszakapunk egy ehhez hasonló választ:

```json
{
  "token": "2|Sh0b4ZqyNPqIsI94heEj4JuttnGVfz0HATPaM9dC",
  "name": "valaki"
}
```

## Azonosítás a végpontoknál

Ha szükség van azonosításra egy végponthoz, akkor el kell küldenünk a bejelentkezéskor kapott tokent.


### Pozíciók lekérdezése

| Végpont | Metódus |
|-|-|
| /api/positons/ | GET |

Jelenleg nem szükséges azonosítás.

### Pozíció felvétele

| Végpont | Metódus |
|-|-|
| /api/positons/ | POST |

Jelenleg nem szükséges azonosítás.

JSON adatként kell megadni:

```json
{
  "name": "valami"
}
```

### Pozíciók módosítása

| Végpont | Metódus |
|-|-|
| /api/positons/{id} | PUT |

Az új adatot JSON formátumban kell megadni:

```json
{
  "name": "valami"
}
```

Jelenleg nem szükséges azonosítás.

### Pozíciók törlése

| Végpont | Metódus |
|-|-|
| /api/positons/{id} | DELETE |

Nem szükséges adat küldése, hogy mit törlünk a végpont végén adjuk meg.

Jelenleg nem szükséges azonosítás.