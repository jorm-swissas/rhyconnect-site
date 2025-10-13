# Rhyconnect - Editing Workflow Guide

## 📝 **Was wo bearbeiten:**

### **Im WordPress-Admin bearbeiten:**
- ✅ Team-Mitglieder hinzufügen/entfernen
- ✅ Social Media Links ändern  
- ✅ Hero-Text anpassen
- ✅ Blog-Posts schreiben
- ✅ Kontaktformular-Einstellungen

### **Im VS Code Workspace bearbeiten:**
- 🎨 Design-Änderungen (Farben, Layout)
- ⚡ Neue Features hinzufügen
- 📱 Responsive-Verbesserungen
- 🔧 JavaScript-Funktionen

## 🔄 **Update-Prozess für Design-Änderungen:**

### **Methode 1: Einzelne Dateien (Schnell)**
```powershell
# Nur CSS geändert?
Copy-Item "style.css" "wordpress-theme\style.css"
# Per FTP: Nur style.css hochladen zu /wp-content/themes/rhyconnect/

# Nur JavaScript geändert?
Copy-Item "script.js" "wordpress-theme\js\script.js"  
# Per FTP: Nur script.js hochladen zu /wp-content/themes/rhyconnect/js/
```

### **Methode 2: Komplettes Theme (Bei größeren Änderungen)**
```powershell
# Alles kopieren
Copy-Item "style.css" "wordpress-theme\style.css"
Copy-Item "script.js" "wordpress-theme\js\script.js"

# Neue ZIP erstellen
Compress-Archive -Path "wordpress-theme\*" -DestinationPath "rhyconnect-theme-v2.zip" -Force

# In WordPress: Design > Themes > Theme hochladen > Aktivieren
```

## 🎯 **Empfohlener Workflow:**

### **Für tägliche Änderungen:**
- **WordPress-Admin nutzen** (Team, Texte, Links)

### **Für Design-Updates:**
1. **Hier in VS Code ändern**
2. **Testen** mit `start index.html`
3. **CSS/JS kopieren** in wordpress-theme/
4. **Per FTP hochladen** (nur geänderte Dateien)

### **Backup-Strategie:**
- **Git-Commits** nach jeder Änderung
- **WordPress-Backup** vor Theme-Updates

## 📁 **Ordner-Struktur beibehalten:**
```
rhyconnect-site/
├── index.html          # Test-Version (HTML)
├── style.css           # Master CSS-Datei
├── script.js           # Master JS-Datei
└── wordpress-theme/    # WordPress-Version
    ├── style.css       # Kopie für WordPress
    ├── index.php       # WordPress-Template
    └── js/script.js    # Kopie für WordPress
```