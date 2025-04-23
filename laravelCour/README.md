# Laravel Cour Project

## Overview
This project is a Laravel application that manages stagiaires (interns) and groupes (groups). It establishes a many-to-many relationship between stagiaires and groupes through a pivot table.

## Project Structure
```
laravelCour
├── app
│   ├── Models
│   │   ├── Groupe.php
│   │   └── Stagiaire.php
├── database
│   ├── migrations
│   │   ├── 2023_10_01_000000_create_stagiaires_table.php
│   │   ├── 2023_10_01_000001_create_groupes_table.php
│   │   └── 2023_10_01_000002_create_stagiaire_groupe_table.php
├── composer.json
└── README.md
```

## Models
- **Stagiaire**: Represents an intern with properties such as `nom`, `prenom`, `email`, `telephone`, and `adresse`. It has a many-to-many relationship with the Groupe model.
- **Groupe**: Represents a group that may contain multiple stagiaires.

## Migrations
- **Create Stagiaires Table**: Defines the schema for the `stagiaires` table.
- **Create Groupes Table**: Defines the schema for the `groupes` table.
- **Create Stagiaire Groupe Table**: Creates the pivot table `stagiaire_groupe` to manage the many-to-many relationship between stagiaires and groupes.

## Installation
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Set up your `.env` file with the database configuration.
4. Run `php artisan migrate` to create the database tables.

## Usage
You can interact with the stagiaires and groupes through the application’s routes and controllers. Make sure to follow the API documentation for specific endpoints and functionalities.

## Contributing
Feel free to submit issues or pull requests for improvements or bug fixes.