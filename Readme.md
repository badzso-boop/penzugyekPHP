#Pénzügy kezelő Backend Gyakorlás

###Tervek

 - [x] Bevétel hozzáadása adatbázishoz
 - [x] Kiadás hozzáadása az adatbázishoz
 - [ ] Az **index.php**-ben a kiadások/bevételek kilistázása __hónapokra__ lebontva
 - [ ] **Grafikon** készítése a kiadások/bevételekhez
 - [ ] Az **index.php**-ben a kiadások/bevételek szerkesztése/törlése
    - [ ] Késöbb ezt admin jelszóval teheti meg bárki
 - [ ] Befektetések hozzáadása
    - [ ] Külső _API_-ról nyomonköveti a befektetések aktualitását és el is menti adatbázisba

---

###Setup

* SQL adatbázis létrehozása _**koltsegvetes**_ néven
* _includes/dbh.inc.php_ **$dbUsername**, **$dbPassword** átírása megfelelő feéhasználói adatokkal

---
> Jegyzet a készítőnek

CREATE TABLE koltsegvetes2 (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    uid int(11) NOT NULL,
    tipus varchar(5) NOT NULL,
    megnevezes varchar(128) NOT NULL,
    mennyiseg int(11) NOT NULL,
    datum varchar(128) NOT NULL
);