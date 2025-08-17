# Einfache Landingpage mit Kirby CMS & Tailwind CSS

Dies ist eine einfache Landingpage, erstellt als Übungsaufgabe, unter Verwendung von Kirby CMS für das Content Management und Tailwind CSS für das Styling.

## Features / Umfang

Die Landingpage besteht aus folgenden Sektionen:

* **Hero-Bereich:** Einleitender Abschnitt mit Überschrift, Text und Bild. Inhalte sind über das Kirby Panel pflegbar. Layout mit Tailwind Grid implementiert.
* **Services-Sektion:** Dynamische Auflistung von Leistungen (Titel, Icon als Bild-Upload, Text). Inhalte werden aus Unterseiten im Kirby Panel verwaltet/geladen.
* **Kontaktformular:** Ermöglicht Besuchern das Senden einer Nachricht. Enthält:
    * Felder: Vorname, Nachname, E-Mail, Nachricht.
    * Frontend-Validierung (HTML5 `required`, `type="email"`).
    * Backend-Validierung (PHP über Kirby Controller).
    * E-Mail-Versand via PHP (Kirby Mailer, konfigurierbar via SMTP).
    * Sicherheitsmaßnahmen: CSRF-Schutz, Honeypot-Feld.
    * Weitere mögliche Sicherheitsmaßnahmen wären Rate-Limiting oder Captcha, bei ganz wichtigen daten auch eine WAF.
* **Styling:** Modernes Styling und Layout mit Tailwind CSS v3.
* **Basis-Layout:** Header und Footer mit Tailwind CSS gestylt.

## Technologie-Stack

* **CMS:** Kirby CMS 
* **Frontend Styling:** Tailwind CSS
* **Backend:** PHP 8.1+
* **Build-Prozess:** Node.js & npm
* **Versionierung:** Git & GitHub

## Voraussetzungen

* PHP >= 8.1 (Empfehlung für Kirby 4)
* Node.js & npm (für Tailwind Build-Prozess)
* Zum Beispiel ein lokaler Webserver (PHP Built-in Server, XAMPP, MAMP etc.) 

## Lokales Setup & Installation

1.  **Repository klonen:**
    ```bash
    git clone <URL_DEINES_GITHUB_REPOS> projekt-name
    cd projekt-name
    ```
2.  **Frontend Abhängigkeiten:** Installiere die Node.js-Pakete (hauptsächlich Tailwind CSS):
    ```bash
    npm install
    ```
3.  **Tailwind CSS Build:**
    * Für die Entwicklung (mit automatischer Neuerstellung bei Änderungen):
        ```bash
        npm run watch
        ```
    * Für einen einmaligen Build (z.B. für die Live-Version):
        ```bash
        npm run build
        ```
        
5.  **Seite aufrufen:** Entweder einen lokalen Server aufsetzen oder die Dateien auf eine Websitendatenbank hochladen und die entsprechende Adresse eingeben.

6.  **Kirby Panel & Benutzer:**
    * Greife auf das Panel zu: `deinewebadresse/panel`.
    * Beim ersten Aufruf wirst du aufgefordert, einen Administrator-Account zu erstellen. Folge den Anweisungen.

## Konfiguration

* **Kontaktformular E-Mail:**
    * Die Empfänger-E-Mail-Adresse muss im Controller `site/controllers/home.php` in der `$kirby->email([...])`-Konfiguration angepasst werden (`'to' => 'deinemail@example.com'`).
    * Die Absender-Adresse (`'from'`) muss ebenfalls angepasst werden und sollte eine gültige Adresse sein.

