# EggShop

## Fejlesztői dokumentáció - Web

## 2022, 2023

## Fejlesztői Nézet

Menjünk be a Tojgli/web könyvtárba a következő konzol paranccsal:

```bash
cd Tojgli/web
```

Amint beléptünk telepítenünk kell a függüségeket amit mi esetünkben az npm paranccsal teszünk meg.

```bash
npm install
```

A webes szerverének elinditása:

```bash
ng serve -o
```

Ha nem globálisan van telepítve az Angular akkor a következő paranccsal lehet elindítani:
```bash
npx ng serve -o
```

##Felépítés

##Könyvtárszerkezet

```txt
Tojgli/web
  |.angular/
  |.vscode/
  |-node_modules/
  |-src/
  |  |-app/
  |  |  |-adminlogin/
  |  |  |-adminmain/
  |  |  |-datasheet/
  |  |  |-home/
  |  |  |-login/
  |  |  |-newproduct/
  |  |  |-productlist/
  |  |  |-profile/
  |  |  |-register/
  |  |  |-pagenotfound/
  |  |  |-shared/
  |  |  `-app-routing.module.ts
  |  |  |-app.component.html
  |  |  |-app.component.css
  |  |  |-app.component.spec.ts
  |  |  |-app.component.ts
  |  |  |-app.module.ts0
  |  |-assets/
  |  |-environments/
  |  |-favicon.ico
  |  |-index.html
  |  |-main.ts
  |  |-polyfill.ts
  |  |-styles.css
  |  `-test.ts
  |-angular.json

```

A webes felület egy Tojás Webshop Angular keretrendszerrel összeállítva.

Vizuális Komponensek:
* app.component - Fő konténer
* adminlogin.component - Admin Bejelentkezés
* adminmain.component - Admin Kezeéő Felület
* datasheet.component - Adatokat mutat egy termékről
* home.component - Főoldal
* login.component - Bejelentkező Felület
* register.component - Regisztrálás Felület
* adminlogin.component - Admin Bejelentkezés
* newproduct.component - Új Termék felülete az admin felületen
* productlist.component - Kilistázza a termékeket
* profile.component - Profil Adatlap
* pagenotfound.component - 404 Hiba Oldal

### AuthService Osztály

Az Angularban elérhető HttpClient osztály segítségével elvégzi a beléptetést, a kiléptetést, és lehetőséget ad annak ellenőrzésére, hogy be vagyunk-e jelentkezve.

#### login Metódus

Három bemenő paramtére van, a felhasználónév, email és a jelszó midnegyik string típusként. A metódus visszatér egy Observer objektummal, ami kapcsolódik az REST API /login végpontjához POSt metódussal.

### Api Environment

A felhasználók és termékek kezelését végzi a REST API szerveren.

#### logout Metódus

Kijelentkezteti az adot felhasználót és átdobja a login oldalra (Törli a tokenjét ami bejelentkezéskor kap)

#### getProducts Metódus

Nincs bemenő paramétere. Lekéri az össze termék adatait, majd visszatér egy Observer objektummal, ami szolgáltatja az összes termék adatait.

#### getUsers Metódus

Nincs bemenő paramétere. Lekéri az össze felhasználó adatait kivéve a jelszót, majd visszatér egy Observer objektummal, ami szolgáltatja az összes felhasználó adatait kivéve a jelszót.