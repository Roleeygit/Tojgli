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

A következő nem vizuális komponensek lettek beépítve:

* api.service - a termékek kezelése a REST API felületen
* auth.guard - Útvonalak védelme
* auth.service - Azonosítás

### AuthService Osztály

Az Angularban elérhető HttpClient osztály segítségével elvégzi a beléptetést, a kiléptetést, és lehetőséget ad annak ellenőrzésére, hogy be vagyunk-e jelentkezve.

#### register Metódus

Négy bemenő paramtére van, a felhasználónév, email, jelszó és újra jelszó midnegyik string típusként. A metódus visszatér egy Observer objektummal, ami kapcsolódik az REST API /register végpontjához POSt metódussal.

#### login Metódus

Kettő bemenő paramtére van, a felhasználónév_vagy_email és a jelszó midnegyik string típusként. A metódus visszatér egy Observer objektummal, ami kapcsolódik az REST API /login végpontjához POSt metódussal.

##### isLoggedIn metódus
Nincs bemenő paramétere. A metódus Window.localStorage tulajdonsággal token néven az elmentett felhasználót keresi. Ha nincs ilyen false értékkel tér vissza. Ha van ilyen a tokennel tér vissza.

### Api Environment

A felhasználók és termékek kezelését végzi a REST API szerveren.

### ApiService Osztály

A termékek kezelését végzi a REST API szerveren.

#### addProduct Metódus

Egyetlen bemenő paramétere tartalmazza, a felvenni kívánt termék adatait. Egy Observer objektummal tér vissza, amiből kiolvasható a szerver válasza.

#### updateProduct Metódus

Egyetlen bemenő paramétere tartalmazza, a felvenni kívánt termék adatait. Egy Observer objektummal tér vissza, amiből kiolvasható a szerver válasza.

#### getProducts Metódus

Nincs bemenő paramétere. Lekéri az össze termék adatait, majd visszatér egy Observer objektummal, ami szolgáltatja az összes termék adatait.

#### getUsers Metódus

Nincs bemenő paramétere. Lekéri az össze felhasználó adatait kivéve a jelszót, majd visszatér egy Observer objektummal, ami szolgáltatja az összes felhasználó adatait kivéve a jelszót.

### Home Komponens

A termékek kezelését végzi a REST API szerveren.

googlemaps objektum
Bele van írva a helynek a google térkép kordinátája a könnyebb lekérdezés érdekében

### AppComponent Komponens
Az alkalmazás fő komponense. Alul jelennek meg a hivatkozott komponensek.

#### HomeComponent.logout() metódus
A kiléptetést intézi a jelenlegi felhasználónak.

### pagenotfound Komponens
Ha nemlétező weboldalra hivatkozik egy látogató, ez a weblapot szolgáljuk ki.

### Register Komponens

registerForm objektum
A regisztrálás felület űrlapjának leképezése, FormGroup és FormBuilder osztályok használatával.

errors objektum
Ebbe a tömbe gyűjti össze a szerverről érkező hibákat.

RegisterComponent.register() metódus
A regisztrálás űrlap alapján elvégzi az azonosítást az auth szolgáltatás segítségével. A szervertől kapott tokent, felhasználónevet, emailt eltárolja Window.localStorage tulajdonsággal.

### Login Komponens

loginForm objektum
A bejelentkező felület űrlapjának leképezése, FormGroup és FormBuilder osztályok használatával.

errors objektum
Ebből a tömbből bontja ki a szerverről érkező hibákat.

LoginComponent.login() metódus
A bejelntkező űrlap alapján elvégzi az azonosítást az auth szolgáltatás segítségével. A szervertől kapott tokent, felhasználónevet, emailt(felhasználónév és email egy mezőben van) eltárolja Window.localStorage tulajdonsággal.

### Productlist Komponens

products objektum
Ebból  a tömbből bontja ki a termék adatait

### Adminmain Komponens

products objektum
Ebból  a tömbből bontja ki a termék adatait

productForm objektum
A termék felvétel felület űrlapjának leképezése, FormGroup és FormBuilder osztályok használatával.

editForm objektum
A termék szerkesztés felület űrlapjának leképezése, FormGroup és FormBuilder osztályok használatával.

#### AdminmainComponent.addProduct() metódus
A metódusnak nincs bemenőparamétere. A .html fájlban megjelenített űrlapból olvassa az új komponens nevét, majd eltárolja az api szolgáltatás használatával.

#### Adminmain.editProduct() metódus
Megjeleníti a szerkesztő űrlapot.

#### Adminmain.updateProduct() metódus
Frissíti a megadott terméket. A metódusnak nincs bemenőparamétere. Az adatbázist az api szolgáltatáson keresztül telepíti. A frissítés után újragenerálja a táblázatot.

#### Adminmain.clearField() metódus
Törli az új termék felvételének űrlap mezőit amiután el lett mentve. A metódusnak nincs bemenőparamétere. Az adatbázist az api szolgáltatáson keresztül telepíti. A frissítés után újragenerálja a táblázatot.

