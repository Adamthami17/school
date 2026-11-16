# Ateliers Partie D — Authentification & School Management (CRUD)

Application de gestion d'école développée avec **Laravel**, **Laravel Breeze** (authentification), **Bootstrap** et **MySQL**.

## Fonctionnalités
- Inscription, connexion, déconnexion (Laravel Breeze, mots de passe hashés)
- Routes `/students` protégées : il faut être connecté
- CRUD des étudiants : liste, ajout (avec upload d'image), détails, modification, suppression

## Installation

```bash
git clone https://github.com/TON-USER/TON-REPO.git
cd TON-REPO
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

Crée la base de données `school` (phpMyAdmin), puis configure le `.env` :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school
DB_USERNAME=root
DB_PASSWORD=
```

```bash
php artisan migrate
php artisan serve
```

Ouvre http://127.0.0.1:8000 puis `/register` pour créer un compte et `/login` pour te connecter.

## Structure principale
- `app/Models/Student.php` : modèle
- `app/Http/Controllers/StudentController.php` : index, create, store, show, edit, update, destroy
- `database/migrations/..._create_students_table.php` : table students
- `resources/views/` : `layout` (template), `home`, `index`, `create`, `show`, `edit`
- `routes/web.php` : routes publiques et protégées par `auth`
- `routes/auth.php` : routes Breeze

## Auteur
Ton NOM Prénom — Ateliers D
