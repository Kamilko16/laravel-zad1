# Zadanie 1

## Przygotowanie środowiska np. Ubuntu z użyciem SQLite
- Uruchom `sudo apt update`
- Uruchom `sudo apt install php8.1 php-xml php-curl php-sqlite3 composer`

## Przygotowanie projektu
- Skopiuj repozytorium używając `git clone`
- Skopiuj `.env.example` do `.env` i zmień dane do bazy na następujące
    - `DB_CONNECTION=sqlite`
    - resztę `DB_...` można usunąć
    - Ewentualnie skonfiguruj własny serwer np. MySQL
- Uruchom polecenie `composer install`
- Uruchom polecenie `php artisan key:generate`
- Uruchom polecenie `php artisan migrate --seed` (do bazy dodani zostaną uzytkownicy i posty, seedowanie postów może trochę potrwać...)
- Uruchom polecenie `sudo php artisan serve --port=80` i wpisz w przeglądarce `localhost`

## Logowanie
Użytkownicy test1, test2, admin mają domyślne hasła jako nazwę użytkownika.

2FA można zarządzać w Ustawieniach, link jest na pasku nawigacji po prawej. Jest opcja wyłączenia, włączenia i weryfikacji. 
