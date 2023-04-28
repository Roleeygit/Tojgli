# Felhasználói dokumentáció - Backend

## Útvonalak magyarázata: (2 különböző: admin, bejelentkezett felhasználó)
 * Admin: Tokenhez kötött útvonalak(login után kapja a felhasználó)
 * Bejelentkezett felhasználó: Bejelentkezéshez kötött útvonalak

 <br></br>

# Admin Végpontok:

| HTTP Kérés | Végpont | Leírás |
| --- | --- | --- |
| PUT | /updateuser/{id} | Egy felhasználó adatainak frissítése |
| DELETE | /deleteuser/{id} | Egy felhasználó törlése |
| DELETE | /deleteprofile/{id} | Egy profil törlése |
| POST | /submit-product | Új termék létrehozása |
| PUT | /updateproduct/{id} | Egy termék adatainak frissítése |
| POST | /image/{id} | Egy kép hozzáadása egy termékhez |
| DELETE | /deleteproduct/{id} | Egy termék törlése |
| PUT | /updateadmin/{id} | Az adminisztrátor adatainak frissítése |

## Fontos tudni! Ezek a funkciók csak akkor működnek, ha a bejelentkezett felhasználó tokenjét beírjuk! Token minta: 
```json
"token": "1|vQ1tJMms635OV5HKHIT5fi252RM6JYkP7jJpOvnc",
```

<br></br>
# Felhasználói Végpontok:

| HTTP Kérés | Végpont | Leírás |
| --- | --- | --- |
| POST | /register | Felhasználó regisztrációja |
| POST | /login | Felhasználó bejelentkezése |
| POST | /logout | Felhasználó kijelentkeztetése |
| GET | /registeredusers | Felhasználók listázása |
| GET | /userbyid/{id} | Egy felhasználó adatainak lekérdezése |
| GET | /productlist | Termékek listázása |
| GET | /ProductById/{id} | Egy termék adatainak lekérdezése |
| GET | /productimg/{id} | Egy termék képének lekérése |
| GET | /categories | Kategóriák listázása |

<br></br>

# Bejelentkezett Felhasználói Végpontok:

| HTTP Kérés | Végpont | Leírás |
| --- | --- | --- |
| GET | /profilelist | Profilok listázása |
| GET | /profile/{id} | Egy profil adatainak lekérdezése |
| PUT | /updateprofile/{id} | Egy profil adatainak frissítése |
| PUT | /purchase/{id} | Egy termék megvásárlása |

## Ezek a funkciók csak akkor működnek, ha a felhasználó már be an jelentkezve.
<br></br>

# Metódusok alkalmazása:

## /register:

### Adatok:

```json
{
	"username" : "Teszt Elek",
	"email" : "teszt.telek@email.hu",
	"password" : "Jelszo123",
	"confirm_password" : "Jelszo123"
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"username": "Teszt",
		"email": "teszt.elek@email.hu",
		"updated_at": "2023-04-24T09:09:54.000000Z",
		"created_at": "2023-04-24T09:09:54.000000Z",
		"id": 1
	},
	"message": "Regisztráció sikeres."
}
```

## /login:

### Adatok:

```json
{
	"username_or_email" : "Teszt",
	"password" : "Jelszo123"

    VAGY:

    "username_or_email" : "teszt.elek@gmail.com",
	"password" : "Jelszo123"
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"token": "1|vQ1tJMms635OV5HKHIT5fi252RM6JYkP7jJpOvnc",
		"username": "Teszt"
	},
	"message": "Bejelentkezés sikeres!"

    VAGY:

    "success": true,
	"data": {
		"token": "1|vQ1tJMms635OV5HKHIT5fi252RM6JYkP7jJpOvnc",
		"email": "teszt.elek@gmail.com"
	},
	"message": "Bejelentkezés sikeres!"

}
```

## /logout:

### Adatok:

```json
{
	"token": "1|vQ1tJMms635OV5HKHIT5fi252RM6JYkP7jJpOvnc"
}
```
### Siker esetén:

```json
{
	"Sikeres kijelentkezés"

}
```

## /registeredusers:

```json
{
	"success": true,
	"data": [
		{
			"id": 1,
			"username": "Teszt",
			"email": "teszt.elek@email.hu",
			"password": "$2y$10$VS5XoEFjgklPSfo5qLBmCO5P4Zr3c0WnDl6knB9V\/BPHykKcaYWY.",
			"is_admin": 0,
			"remember_token": "Nincs még adat megadva!",
			"created_at": "2023-04-24T09:09:54.000000Z",
			"updated_at": "2023-04-24T09:09:54.000000Z"
		}
	],
	"message": "Regisztrált felhasználók listája kiirva!"
}
```

## /updateuser/{id}:

### Adatok:

```json
{
	"username" : "Tesztelés",
	"email" : "teszt.elek@gmail.com",
	"password" : "Jelszo1234"
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"username": "Tesztelés",
		"email": "teszt.elek@gmail.com",
		"password": "$2y$10$tMd13QmSkY1Y1yIWLxsxsOtJ34MyOv0GaxpliLKdhT3YczKmjckDW",
		"is_admin": 0,
		"remember_token": "Nincs még adat megadva!",
		"created_at": "2023-02-14T07:36:05.000000Z",
		"updated_at": "2023-04-24T09:24:04.000000Z"
	},
	"message": "Felhasználó adatai frissítve!"
}
```

## /updateadmin/{id}:

### Adatok:

```json
{
	"is_admin" : 1
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"username": "Tesztelés",
		"email": "teszt.elek@gmail.com",
		"password": "$2y$10$tMd13QmSkY1Y1yIWLxsxsOtJ34MyOv0GaxpliLKdhT3YczKmjckDW",
		"is_admin": 1,
		"remember_token": "Nincs még adat megadva!",
		"created_at": "2023-02-14T07:36:05.000000Z",
		"updated_at": "2023-04-24T09:24:40.000000Z"
	},
	"message": "Frissítés sikeres!"
}
```

## /userbyid/{id}:

### Adatok:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"username": "Tesztelés",
		"email": "teszt.elek@gmail.com",
		"password": "$2y$10$tMd13QmSkY1Y1yIWLxsxsOtJ34MyOv0GaxpliLKdhT3YczKmjckDW",
		"is_admin": 1,
		"remember_token": "Nincs még adat megadva!",
		"created_at": "2023-02-14T07:36:05.000000Z",
		"updated_at": "2023-04-24T09:24:40.000000Z"
	},
	"message": "1. Felhasználó adatainak betöltése sikeres."
}
```

## /deleteuser/{id}:

### Siker esetén:

```json
{
	"success": true,
	"data": [],
	"message": "Felhasználó törlése sikeresen megtörtént."
}
```

## /productlist: 

### Adatok:

```json
{

	"success": true,
	"data": [
		{
			"id": 1,
			"name": "Teszt Tojás",
			"price": 10,
			"weight": 10,
			"description": "valamilyen leirás",
			"image": "http:\/\/localhost:8000\/storage\/app\/public\/images\/1682664470_25085217_3aecb840115cfb1391cc35bf33e772ec_wm.jpg",
			"category_id": "Kitalált Tojás"
		},
		{
			"id": 2,
			"name": "Teszt Tojáska",
			"price": 10000,
			"weight": 10,
			"description": "valamilyen leirás",
			"image": "http:\/\/localhost:8000\/storage\/app\/public\/images\/1682664565_source.gif",
			"category_id": "Kitalált Tojás"
		}, 
	        ],
	        "message": "Termékek kiirva!"
}
```

## /categories: 

### Adatok:

```json
{
	"success": true,
	"data": [
		{
			"id": 1,
			"category": "Csirke Tojás"
		},
		{
			"id": 2,
			"category": "Strucc Tojás"
		},
		{
			"id": 3,
			"category": "Kitalált Tojás"
		},
		{
			"id": 4,
			"category": "Lúd Tojás"
		},
		{
			"id": 5,
			"category": "Valamilyen Tojás"
		}
	],
	"message": "Kategóriák kiirva!"
}
```


## /submit-product:

### Adatok:

```json
{
	"name" : "Teszt Tojás",
	"price" : 10,
	"weight" : 10,
	"description" : "valamilyen leirás",
	"category" : "Kitalált Tojás"
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"name": "Teszt Tojás",
		"price": 10,
		"weight": 10,
		"description": "valamilyen leirás",
		"image": null,
		"category_id": "Kitalált Tojás"
	},
	"message": "Termék létrehozva!"
}
```

## /image/{id}:

### Adatok:

```json
image + a kép feltöltve
```

### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"name": "Teszt Tojás",
		"price": 10,
		"weight": 10,
		"description": "valamilyen leirás",
		"image": "storage\/app\/public\/images\/1682665107_dZgkX36X8cdu.gif",
		"category_id": "Kitalált Tojás"
	},
	"message": "A kép frissítve!"
}
```

## /productimg/{id}:

### Siker esetén:

```json
Kép megjelenik
```

## ProductById/{id}:

### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"name": "Teszt Tojás",
		"price": 10,
		"weight": 10,
		"description": "valamilyen leirás",
		"image": "storage\/app\/public\/images\/1682664470_25085217_3aecb840115cfb1391cc35bf33e772ec_wm.jpg",
		"category_id": "Kitalált Tojás"
	},
	"message": "Termék betöltve."
}
```

## /updateproduct/{id}:


### Adatok:

```json
{
	{
	"name" : "Tojás",
	"price" : 10,
	"weight" : 10,
	"description" : "valamilyen leirás"
}
}
```
### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"username": "Tesztelés",
		"email": "teszt.elek@gmail.com",
		"password": "$2y$10$tMd13QmSkY1Y1yIWLxsxsOtJ34MyOv0GaxpliLKdhT3YczKmjckDW",
		"is_admin": 1,
		"remember_token": "Nincs még adat megadva!",
		"created_at": "2023-02-14T07:36:05.000000Z",
		"updated_at": "2023-04-24T09:24:40.000000Z"
	},
	"message": "Frissítés sikeres!"
}
```

## /deleteproduct/{id}:

### Siker esetén:

```json
{
	"success": true,
	"data": [],
	"message": "Termék törölve!"
}
```

## /profilelist:


### Siker esetén:

```json
{
	"success": true,
	"data": [
		{
			"id": 1,
			"surname": "Nincs még adat megadva!",
			"lastname": "Nincs még adat megadva!",
			"country": "Nincs még adat megadva!",
			"city": "Nincs még adat megadva!",
			"address": "Nincs még adat megadva!",
			"order_date": "Nincs még adat megadva!",
			"payment_mode": "Nincs még adat megadva!",
			"delivery_mode": "Nincs még adat megadva!"
		},
		{
			"id": 2,
			"surname": "Nincs még adat megadva!",
			"lastname": "Nincs még adat megadva!",
			"country": "Nincs még adat megadva!",
			"city": "Nincs még adat megadva!",
			"address": "Nincs még adat megadva!",
			"order_date": "Nincs még adat megadva!",
			"payment_mode": "Nincs még adat megadva!",
			"delivery_mode": "Nincs még adat megadva!"
		}
	],
	"message": "Profil Adatok kiirva!"
}
```

## /profile/{id}:


```json
{
	"success": true,
	"data": {
		"id": 1,
		"surname": "Nincs még adat megadva!",
		"lastname": "Nincs még adat megadva!",
		"country": "Nincs még adat megadva!",
		"city": "Nincs még adat megadva!",
		"address": "Nincs még adat megadva!",
		"order_date": "Nincs még adat megadva!",
		"payment_mode": "Nincs még adat megadva!",
		"delivery_mode": "Nincs még adat megadva!"
	},
	"message": "Profil kiirva."
}
```

## /updateprofile/{id}:

### Adatok:

```json
{
	"surname" : "Teszt",
  "lastname" : "Elek",
  "country" : "Hungary",
  "city" : "Budapest",
  "address" : "Nagy Jani utca 12"
}
```

### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"surname": "Teszt",
		"lastname": "Elek",
		"country": "Hungary",
		"city": "Budapest",
		"address": "Nagy Jani utca 12",
		"order_date": "Nincs még adat megadva!",
		"payment_mode": "Nincs még adat megadva!",
		"delivery_mode": "Nincs még adat megadva!"
	},
	"message": "Profil Adatok frissítve!"
}
```


## /deleteprofile/{id}:

### Siker esetén:

```json
{
	"success": true,
	"data": [],
	"message": "Profil törlése sikeresen megtörtént."
}
```

## /purchase/{id}:

### Adatok:

```json
{

	"payment_mode" : "Készpénz",
	"delivery_mode" : "Házhozszállítás"
}
```

### Siker esetén:

```json
{
	"success": true,
	"data": {
		"id": 1,
		"surname": "Teszt",
		"lastname": "Elek",
		"country": "Hungary",
		"city": "Budapest",
		"address": "Nagy Jani utca 12",
		"order_date": "2023-04-28T08:16:41.369822Z",
		"payment_mode": "Készpénz",
		"delivery_mode": "Házhozszállítás"
	},
	"message": "A vásárlás sikeres!"
}
```