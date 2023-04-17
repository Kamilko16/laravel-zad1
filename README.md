# Zadanie 1

## Przygotowanie środowiska np. Ubuntu z użyciem SQLite
- Uruchom `sudo apt update`
- Uruchom `sudo apt install php8.1 php-xml php-curl php-sqlite3 composer`

## Przygotowanie projektu
- Skopiuj repozytorium używając `git clone`
- Skopiuj `.env.example` do `.env` i zmień dane do bazy na następujące
    - `DB_CONNECTION=sqlite`
    - resztę `DB_...` można usunąć
    - Na potrzebę ustalonych już kodów Authenticator `APP_KEY=base64:reAmzW5F9ZByxNRaNpOzTUfs25IT8CfODA86qcc80Iw=` 
    - Ewentualnie skonfiguruj własny serwer np. MySQL
- Uruchom polecenie `composer install`
- Uruchom polecenie `php artisan migrate --seed` (do bazy dodani zostaną uzytkownicy i posty, seedowanie postów może trochę potrwać...)
- Uruchom polecenie `sudo php artisan serve --port=80` i wpisz w przeglądarce `localhost`

## Logowanie
Użytkownicy test1, test2, admin mają już ustalony kod 2FA oraz domyślne hasła to nazwa użytkownika.

Uzytkownik bez 2FA np. test3 nie może się w ogóle zalogować. (Takie zrozumiałem zamierzenie, jeżeli nie to trzeba dodać do pliku .env `2FA_LOCK=false`)

2FA można zarządzać w Ustawieniach, link jest na pasku nawigacji po prawej. Jest opcja wyłączenia, włączenia i weryfikacji. Jeżeli użytkownik nie zweryfikuje kodu i wyjdzie z ustawień to może stracić dostęp do konta.  
Kod do generatora haseł dla konta test1, test2, admin: `I2C4MAVQNRJ2KL46`
