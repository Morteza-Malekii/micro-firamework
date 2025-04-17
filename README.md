# Micro PHP Framework

A lightweight and extendable PHP mini framework built from scratch to understand and implement the core principles of modern web development.

##  Features

- Clean MVC architecture
- Simple routing system
- Controller and middleware support
- JSON-based and MySQL-compatible model structure
- Autoloading via Composer
- Easy to extend and customize

## Getting Started

### Requirements

- PHP 8.x
- Composer
- MySQL (optional, if using `schema.sql`)
- Apache (with `.htaccess` support) or PHP built-in server

###  Installation

Clone the repository and install dependencies:

```bash
git clone https://github.com/Morteza-Malekii/micro-firamework.git
cd micro-firamework
composer install
cp .env.example .env

```
## Database Setup

If you’re using MySQL, import the database structure from:

Storage/mysqldatabase/schema.sql


## Environment Configuration

The .env file controls your environment settings:

HOST=http://localhost:8000

DB_HOST=localhost

DB_NAME=dbname

DB_USER=

DB_PASS=



## Author

Developed with ❤️ by Morteza Malekii


