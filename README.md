# 📘 Kursiki – Platforma kursów online

## 🔷 Opis projektu

Kursiki to platforma e-learningowa stworzona w Laravelu, umożliwiająca przeglądanie kursów, zapisywanie się na nie oraz zarządzanie dostępem użytkownika.

Projekt rozwijany jest w oparciu o podejście praktyczne – struktura i logika odzwierciedlają realne systemy produkcyjne.

---

## 🔷 Technologie

- Backend: Laravel 13
- Frontend: Blade + Tailwind CSS
- Baza danych: MySQL
- Środowisko: XAMPP (localhost)

---

## 🔷 Funkcjonalności

### ✔ Publiczny frontend
- Strona główna
- Lista kursów
- Szczegóły kursów
- Blog
- FAQ
- Kontakt

### ✔ System użytkownika
- Rejestracja
- Logowanie
- Wylogowanie
- Panel użytkownika

### ✔ Kursy
- Wyświetlanie kursów
- Szczegóły kursu
- Zapis na kurs
- Wykrywanie zapisu

### ✔ Newsletter
- Formularz zapisu
- Walidacja danych
- Zapis do bazy

---

## 🔷 Architektura bazy danych

### Użytkownicy
- users
- profile_uzytkownikow

### Role i uprawnienia
- role
- uzytkownicy_role
- uprawnienia
- role_uprawnienia

### Kursy
- kursy
- kategorie_kursow
- poziomy_kursow
- statusy_kursow
- kursy_tagi
- tagi_kursow

### Struktura kursu
- sekcje_kursow
- lekcje
- materialy_lekcji
- pliki_wideo

### Relacje użytkownik ↔ kurs
- zapisy_na_kursy
- postepy_kursow
- postepy_lekcji

### Zamówienia
- zamowienia
- statusy_zamowien
- statusy_platnosci

### Inne
- subskrybenci_newslettera

---

## 🔷 Kluczowa logika

- Rejestracja tworzy użytkownika, profil i przypisuje rolę
- Logowanie wykorzystuje Auth::attempt
- Panel pokazuje dane użytkownika i kursy
- Zapis na kurs sprawdza istnienie wpisu i dodaje rekord
- Newsletter zapisuje użytkownika po walidacji

---

## 🔷 Routing

### Public
- /
- /kursy
- /kursy/{slug}
- /blog
- /kontakt
- /faq

### Auth
- /logowanie
- /rejestracja

### Panel
- /panel

### Akcje
- POST /kursy/{slug}/zapisz-sie
- POST /newsletter/zapis
- POST /wyloguj

---

## 🔷 Struktura projektu

### Kontrolery
- Auth\RegisterController
- Auth\LoginController
- CourseController
- PanelController
- ZapisNaKursController
- NewsletterController

### Widoki
- layouts/app.blade.php
- auth/*
- panel/*
- kursy/*

---

## 🔷 Status projektu

✔ Rejestracja  
✔ Logowanie  
✔ Panel użytkownika  
✔ Zapis na kurs  
✔ Moje kursy  
✔ Newsletter  

Projekt jest stabilny i gotowy do dalszego rozwoju.

---

## 🔷 Roadmapa

### Najbliższe
- Postępy kursów
- Dostęp do lekcji

### Średni etap
- Zamówienia
- Płatności
- Koszyk

### Zaawansowane
- Panel administratora
- Zarządzanie kursami
- Statystyki

---

## 🔷 Autor

mgr inż. Zoltan Farkas  
Specjalista ds. programowania aplikacji webowych i desktopowych oraz szkoleń 
Wykładowca AHE w Łodzi