# Makeni College of Education Zambia CMS Website

Domain target: `makenicollege.org`

This is a Laravel CMS-based public college website for Makeni College of Education Zambia. It includes CMS-managed public content and portal login UI pages prepared for future systems. Real SMS, LMS, exams, library, student management, and portal authentication are intentionally not implemented yet.

## Stack

- Laravel 13
- MySQL-ready database configuration
- Blade templates
- Bootstrap 5 styling
- Eloquent models, migrations, and seed data

## Main Public Routes

- `/`
- `/about-us`
- `/departments`
- `/programmes`
- `/gallery`
- `/latest-news`
- `/contact-us`
- `/staff-portal`
- `/student-portal`
- `/lms-portal`
- `/exam-portal`

## CMS Admin

- `/admin`

The admin panel manages:

- Site logo and homepage hero/banner path
- Homepage hero slider slides
- About and page content
- Departments
- Programmes/courses
- Fees
- Enrollment steps
- Gallery records and categories
- News posts
- Notices/announcements
- Contact details
- Footer content
- SEO title and meta description
- Portal labels and links
- Admin users and roles

Seeded demo admin user:

- Email: `admin@makenicollege.org`
- Password: `password`

No CMS authentication guard has been added yet. Add Laravel authentication before production deployment.

## Local Setup

Install dependencies if needed:

```bash
php C:/Users/prith/Documents/AI_Projects/tools/composer/composer.phar install
npm install
```

For MySQL, copy `.env.example` to `.env` and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mace_college
DB_USERNAME=root
DB_PASSWORD=
```

Then run:

```bash
php artisan key:generate
php artisan migrate --seed
```

Start locally:

```bash
php -S 127.0.0.1:8002 -t public
```

On this machine, `php artisan serve` failed to bind, while the PHP built-in server worked correctly.

## Validation Performed

```bash
php artisan migrate:fresh --seed
npm run build
php artisan test
```

HTTP checks returned `200` for all requested public pages, all portal pages, `/admin`, `/admin/hero-slides`, `/admin/fees`, and `/admin/enrollment-steps`.

The public UI uses Tailwind CSS via Vite and reusable Blade components for section headings, programme cards, fee tables, and enrollment steps.
