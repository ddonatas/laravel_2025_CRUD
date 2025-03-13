<h1>CRUD pavyzdys 2025-03-13</h1>
<b>Aprašymas: </b>
Šis projektas yra Laravel  pagrindu sukurtas CRUD (Create, Read, Update, Delete) pavyzdys su studentų ir miestų duomenų valdymu.
    Įdiegus sudaromos ir užpildomos dvi lentelės students (su faker 1000 įrašų) ir cities  (su 5 LT miestais)

<b>Diegimas: </b>
norint įdiegti projektą reikia atsisiųsti arba  naudoti git (https://git-scm.com/) per CMD:
1. git clone https://github.com/ddonatas/laravel_2025_CRUD
2. cd laravel_2025_CRUD
3. composer install
5. cp .env.example .env  << pavzydinis .env padaromas darbiniu, kadangi į github originalas NEKELIAMAS dėl saugumo
6. php artisan key:generate  << uzpildomas key unikaliu kodu
7. sukurti per phpMyAdmin DB pvz.: laravel_2025_CRUD 
8. Sukonfogūruoti .env byloje  DB prisijungimą pvz:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravelPS23
    DB_USERNAME=root
    DB_PASSWORD=
9. php artisan migrate
10. php artisan db:seed
11. php artisan serve

<b> API / CRUD funkcionalumas</b>
 Studentai

/students – Peržiūrėti visus studentus
/students/create – Pridėti naują studentą
/students/{id}/edit – Redaguoti studentą
/students/{id} (DELETE) – Ištrinti studentą

<b>Naudojama  </b>
Laravel 10
MySQL 
Bootstrap / Tailwind CSS
Faker (testiniams duomenims)
Eloquent ORM 