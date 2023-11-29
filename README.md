
# Zadanie Dodatkowe

Do poprawnego działania strony trzeba najpierw zaimportować plik **erpdatabase.sql**

⚠ Baza danych musi nazywać się **"erpdatabase"**

## 📄 register_page.php

Na tej stronie można założyć nowe konto klienta.

## 📄 login_page.php

Na tej stronie można zalogować się na poprzednio utworzone konto.

## 📄 index.php

Główna strona na której znajdują się formularze zależnie od uprawnień użytkownika.

### ℹ Uprawnienia użytkowników

**niezalogowany**
  - przeglądanie produktów
    
**klient**
- składanie zamówień
- przeglądanie produktów
  
**pracownik**
- składanie zamówień
- przeglądanie produktów
- przeglądanie klientów
- dodawanie produktów
- dodawanie klientów
- usuwanie produktów
- usuwanie klientów
- edytowanie produktów
- edytowanie klientów
  
**admin**
- składanie zamówień
- przeglądanie produktów
- przeglądanie klientów
- przeglądanie pracowników
- dodawanie produktów
- dodawanie klientów
- dodawanie pracowników
- usuwanie produktów
- usuwanie klientów
- edytowanie produktów
- edytowanie klientów
- ma dostęp do *historii akcji pracowników na stronie*

### 🔐 Loginy i hasła do testów

**klient**
- Login: jasio
- Hasło: samolot
  
**pracownik**
- Login: andrzej
- Hasło: praca123
  
**admin**
- Login: admin
- Hasło: admin123

## 📂/modules
Folder /modules zawiera wszystkie elementy strony index.php

## 📂/scripts
Folder /scripts zawiera wszystkie skrypty potrzebne do poprawnego funkcjonowania strony.
## Autorzy

- [Oskar Kośmider](https://www.github.com/Raksio22)

