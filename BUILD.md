# WordPress Theme Build Script

Dieses Theme verwendet einen optimierten Build-Prozess, der ein produktionsfertiges Theme-Paket erstellt.

## Verfügbare Scripts

### Development
```bash
npm run dev
```
Startet den Vite Development Server. Assets werden in `assets/dist/` kompiliert (wird bei jedem Start neu erstellt).

### Production Build
```bash
npm run build:theme
```
Erstellt ein produktionsfertiges Theme-Paket:
- Buildet alle Assets mit Vite
- Kopiert nur notwendige Dateien
- Erstellt einen separaten Ordner **außerhalb** des Projekts
- Generiert eine ZIP-Datei für WordPress-Upload
- Räumt das Quellverzeichnis auf (entfernt `assets/dist/`)

## Build-Ausgabe

Der Build wird erstellt in:
```
/Users/tanja/Documents/webprojects/alwera-build/
├── alwera/              # Theme-Ordner mit allen notwendigen Dateien
└── alwera.zip          # ZIP-Datei für WordPress-Upload
```

## Was wird ins finale Theme kopiert?

### ✅ Inkludiert:
- Alle `.php` Dateien
- `style.css`, `screenshot.png`, `readme.md`
- `acf-json/` - ACF Felddefinitionen
- `configure/` - Theme-Konfigurationen
- `partials/` - Template-Teile
- `template-parts/` - Template-Komponenten
- `templates/` - Template-Dateien
- `languages/` - Übersetzungen
- `static/` - Statische Assets
- `assets/dist/` - Kompilierte CSS/JS-Dateien
- `vendor/` - Composer-Abhängigkeiten (falls vorhanden)

### ❌ Ausgeschlossen:
- `node_modules/`
- `assets/src/` - Quell-Dateien (SCSS, JS)
- `.git/` und `.github/`
- Konfigurationsdateien (`.gitignore`, `.editorconfig`, etc.)
- Build-Tools (`package.json`, `vite.config.js`, etc.)
- Development-Dateien

## Workflow

1. **Development**: `npm run dev` für lokale Entwicklung
2. **Build**: `npm run build:theme` für Production-Build
3. **Upload**: Die generierte `alwera.zip` in WordPress hochladen

## Vorteile

- ✨ Saubere Trennung von Dev- und Production-Umgebung
- 🚀 `npm run dev` funktioniert weiterhin einwandfrei
- 📦 Minimales, produktionsfertiges Theme-Paket
- 🔄 Automatische Bereinigung nach dem Build
- 📁 Build-Ordner außerhalb des Projekts (kein Git-Konflikt)
