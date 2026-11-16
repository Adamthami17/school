# Étapes pour construire le projet

1. Créer le projet et installer Breeze (Atelier D-1)
```bash
composer create-project laravel/laravel School
cd School
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
```

2. Créer la base `school` (phpMyAdmin) et configurer le `.env` (DB_DATABASE=school, DB_USERNAME=root, DB_PASSWORD=).

3. Copier **le contenu** du dossier `school-solution` par-dessus le projet `School`
   (accepter de remplacer `routes/web.php`). Il contient :
   - `app/` : modèle Student + StudentController
   - `database/migrations/` : table students
   - `resources/views/` : layout.blade.php (adapté avec Login/Register/Logout), home, index, create, show, edit
   - `routes/web.php` : routes publiques + routes protégées (auth)
   - `public/css`, `public/img`, `public/js`, `public/image` : le template
   Important : faire cette copie APRÈS `breeze:install`, car Breeze réécrit `routes/web.php`.

4. Bootstrap (Atelier D-3) puis compilation :
```bash
composer require laravel/ui
php artisan ui bootstrap
npm install
npm run dev
```
   Si une erreur « Unable to locate Mix file » apparaît sur /login, relancer `npm run dev`.

5. Migration et lancement :
```bash
php artisan migrate
php artisan serve
```

6. Tester : http://127.0.0.1:8000/register, /login, puis /students
   (ajout avec image, Show, Edit, Delete).
   Sans connexion, /students doit rediriger vers /login.

7. (Optionnel) Après connexion, rediriger directement vers la liste :
   dans `app/Providers/RouteServiceProvider.php`, mettre `public const HOME = '/students';`
