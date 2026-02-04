# WordPress Vite.js starter theme


- [ES6](https://github.com/lukehoban/es6features#readme) for JavaScript
- [SASS](http://sass-lang.com/) preprocessor for CSS following [SASS Guidelines](https://sass-guidelin.es/#the-7-1-pattern)
- [Bootstrap 5](https://getbootstrap.com/docs/5.3/getting-started/introduction/) as CSS framework ([customizable with SASS](https://getbootstrap.com/docs/5.3/customize/sass/))
- [Vite.js](https://vitejs.dev/) to compile theme assets and provide live reload

## Requirements

* [Node](https://nodejs.org/)

## Usage

First, clone this repository in your WordPress themes directory.

Then, run the following commands in the theme's directory :

	npm install

Launch your watch for assets with :

	npm run dev

For production sites, create your build with :

	npm run build

## Vite & WordPress
- All the static assets used in scss or js files (images, fonts, etc.) are copied as-is to the `dist` directory. The other images used directly in php files are <u>not copied</u>.
- To detect dev mode in php there is no `dist` directory, it is added on build.


## Required Plugins
This theme expects the following plugins to be installed:

- Advanced Custom Fields PRO (`wpackagist-plugin/advanced-custom-fields:^6.5`) costs 49$ yearly per site
- Advanced Custom Fields Extended -> free addon to acf pro, better UI 


## Required Plugins
some wordpress backend configuration
- in settings > read: static page/homepage 
- acf json import (wenn nicht mit template mit importiert)

##Github Action
### 1.Zugangsdaten vom Hosting
	•	Server-Adresse (Host/IP)
	•	SSH- oder SFTP-Benutzername
	•	Root-Pfad zum Webroot (z. B. /var/www/html, /home/username/public_html)

⚠️ Falls nur SFTP verfügbar ist: GitHub Actions kann das nicht direkt. Dann muss entweder SSH aktivieren lassen oder manuell hochladen.

### 2. Deploy-Key erstellen

Auf deinem Rechner einen speziellen Key für GitHub Actions anlegen:
  `cd ~/.ssh
  ssh-keygen -t ed25519 -C "github-actions" -f github-actions`
	•	github-actions  → privater Key
	•	github-actions.pub → öffentlicher Key


 ### 3. Key auf den Server laden
	1.	Auf dem Server als Kunde/SSH-User einloggen
	2.	Den Inhalt von github-actions.pub in ~/.ssh/authorized_keys einfügen:

`cat github-actions.pub >> ~/.ssh/authorized_keys
chmod 700 ~/.ssh
chmod 600 ~/.ssh/authorized_keys`

### 4. GitHub Secrets einrichten
Im Repo → Settings → Secrets and variables → Actions → New repository secret
Diese Variablen anlegen:

| Name                | Beispielwert                  | Beschreibung                          |
|---------------------|-------------------------------|--------------------------------------|
| `SSH_HOST`          | `123.45.67.89` oder `domain.tld` | Server-Adresse                        |
| `SSH_USER`          | `deploy` oder `webuser`       | SSH-Benutzer                          |
| `SSH_KEY`           | Inhalt der Datei `github-actions` (privater Key) | Privater Deploy-Key |
| `REMOTE_PATH_STAGING` | `/var/www/staging.domain.tld` | Pfad zum Staging-Webroot              |
| `REMOTE_PATH_PROD`  | `/var/www/domain.tld`         | Pfad zum Live-Webroot                 |



## Troubleshooting [dev mode]

- Vite needs to know the root path of your project so <u>you cannot use a subdirectory</u> as the root of your WordPress installation.
- If you haven't started the dev server, your assets will not be compiled just `npm run dev` and refresh page.
- In your scss files use the alias `@` to target the `static/` directory. ie : `background-image: url('@/img/logo.png');`


Based on https://github.com/oguilleux/vite-wordpress-starter-theme 

