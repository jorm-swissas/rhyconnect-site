# Rhyconnect Deployment Guide

## Hosting auf rhyconnect.ch

### Option 1: Shared Hosting / cPanel
1. **Dateien hochladen**:
   - Verbinde dich per FTP oder über das cPanel File Manager
   - Lade alle Dateien in das `public_html` Verzeichnis hoch
   - Stelle sicher, dass `index.html` im Stammverzeichnis liegt

2. **Domain konfigurieren**:
   - Gehe zu deinem Domain-Provider
   - Stelle sicher, dass rhyconnect.ch auf deinen Hosting-Server zeigt
   - Warte auf DNS-Propagation (bis zu 24h)

### Option 2: Netlify (empfohlen für einfaches Deployment)
1. **Repository vorbereiten**:
   - Push den Code zu GitHub
   - Oder nutze den Drag & Drop Upload

2. **Netlify Setup**:
   - Gehe zu netlify.com
   - "New site from Git" oder drag & drop den Ordner
   - Custom Domain: rhyconnect.ch hinzufügen
   - SSL-Zertifikat wird automatisch erstellt

### Option 3: Vercel
1. **GitHub verbinden**:
   - Push Code zu GitHub
   - Vercel-Account erstellen
   - Repository importieren

2. **Domain konfigurieren**:
   - Custom Domain rhyconnect.ch hinzufügen
   - DNS-Einstellungen anpassen

## DNS-Konfiguration

### Für die meisten Hosting-Provider:
```
Type: A
Name: @
Value: [IP-Adresse deines Servers]

Type: CNAME
Name: www
Value: rhyconnect.ch
```

### Für Netlify:
```
Type: CNAME
Name: @
Value: [deine-seite].netlify.app

Type: CNAME
Name: www
Value: [deine-seite].netlify.app
```

## SSL/HTTPS Setup

### Automatisch (empfohlen):
- Netlify/Vercel: Automatisch aktiviert
- Cloudflare: Kostenloses SSL verfügbar

### Manuell:
- Let's Encrypt über cPanel
- SSL-Zertifikat vom Hosting-Provider

## Performance-Optimierung

### .htaccess (für Apache Server):
```apache
# Gzip Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>

# Browser Caching
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
</IfModule>
```

## Checkliste vor Go-Live

- [ ] Alle Links funktionieren
- [ ] Kontaktformular getestet
- [ ] Mobile Responsiveness geprüft
- [ ] Browser-Kompatibilität getestet
- [ ] Ladegeschwindigkeit optimiert
- [ ] SEO-Meta-Tags überprüft
- [ ] SSL-Zertifikat aktiv
- [ ] robots.txt und sitemap.xml hochgeladen
- [ ] Google Analytics eingerichtet (optional)
- [ ] Google Search Console konfiguriert (optional)

## Wartung & Updates

### Regelmäßige Aufgaben:
- Content-Updates bei neuen App-Features
- Team-Sektion bei Änderungen aktualisieren
- Backup der Website erstellen
- Performance monitoring

### Bei App-Updates:
- Screenshots in der Hero-Section aktualisieren
- Neue Features in der Features-Sektion hinzufügen
- Download-Links anpassen

## Troubleshooting

### Website lädt nicht:
1. DNS-Einstellungen prüfen
2. Hosting-Server-Status checken
3. Browser-Cache leeren

### Darstellungsprobleme:
1. CSS-Datei erreichbar?
2. JavaScript-Konsole auf Fehler prüfen
3. Mobile/Desktop-Version testen

### Kontaktformular funktioniert nicht:
1. Backend-Service konfiguriert?
2. E-Mail-Server-Einstellungen prüfen
3. Spam-Filter checken