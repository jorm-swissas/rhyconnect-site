# Rhyconnect WordPress Theme

Ein maßgeschneidertes WordPress-Theme basierend auf der originalen Rhyconnect HTML-Website.

## Installation

1. Lade den `wordpress-theme` Ordner auf deinen WordPress-Server hoch
2. Benenne ihn in `rhyconnect` um
3. Platziere ihn in `/wp-content/themes/rhyconnect/`
4. Aktiviere das Theme im WordPress-Admin unter "Design > Themes"

## Features

- ✅ Exakt gleiches Design wie die HTML-Version
- ✅ Alle Rhein-Blau Farben beibehalten
- ✅ Responsive Design
- ✅ Team-Member Management über WordPress-Admin
- ✅ Anpassbare Social Media Links
- ✅ Funktionierendes Kontaktformular
- ✅ WordPress Customizer Integration

## WordPress-Admin Funktionen

### Team-Mitglieder verwalten
- Gehe zu "Team Members" im WordPress-Admin
- Füge neue Team-Mitglieder hinzu
- Füge Rolle und Bio hinzu
- Lade Profilbilder hoch

### Design anpassen
- Gehe zu "Design > Customizer"
- **Hero Section**: Titel und Untertitel bearbeiten
- **Social Media**: Instagram, Facebook, TikTok Links setzen

### Kontaktformular
- Funktioniert automatisch
- E-Mails werden an WordPress-Admin gesendet
- Nutzt WordPress-interne wp_mail() Funktion

## Verzeichnisstruktur

```
rhyconnect/
├── style.css (identisch mit HTML-Version + WordPress-Header)
├── index.php (Homepage Template)
├── header.php (Header Template)
├── footer.php (Footer Template)
├── functions.php (WordPress-Funktionen)
└── js/
    └── script.js (identisches JavaScript)
```

## Upload-Anleitung

1. **Komprimiere den `wordpress-theme` Ordner zu einer ZIP-Datei**
2. **WordPress-Admin öffnen**
3. **Design > Themes > Neues Theme hinzufügen**
4. **Theme hochladen > ZIP-Datei wählen**
5. **Theme aktivieren**

Alternativ per FTP:
1. **Lade den Ordner nach `/wp-content/themes/` hoch**
2. **Benenne ihn in `rhyconnect` um**
3. **Aktiviere das Theme im WordPress-Admin**