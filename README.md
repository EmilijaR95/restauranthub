# Restaurant Management System - Laravel Livewire CRUD Application

A full-featured restaurant management system built with Laravel Livewire, demonstrating modern PHP development practices, reactive components and responsive design.

## 🚀 Tech Stack

- **Laravel** (latest stable version)
- **Livewire v3** - Reactive components
- **PHP 8.1+**
- **PostgreSQL** - Database
- **Tailwind CSS** - Styling
- **Blade Components** - Reusable UI elements

## 📋 Assignment Requirements

This project demonstrates proficiency in:
- Laravel MVC architecture and Eloquent ORM
- Livewire reactive components and real-time updates
- Database design and migrations
- Responsive web design
- RESTful principles and CRUD operations
- Modern PHP development practices

## 🛠️ Setup Instructions

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- PostgreSQL
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd restaurant-management-livewire
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=restaurant_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Database setup**
   ```bash
   createdb restaurant_management
   php artisan migrate
   php artisan db:seed
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to view the application.

## 🎯 Features

### Core Functionality
- **Restaurant Listing** - Browse all restaurants with filtering capabilities
- **Create Restaurant** - Add new restaurants with comprehensive details
- TODO **View Details** - Display complete restaurant information
- **Update Restaurant** - Edit existing restaurant data
- **Delete Restaurant** - Remove restaurants with confirmation modal

### Advanced Features
- TODO **Real-time Filtering** - Multi-select cuisine and city filters
- **Responsive Design** - Optimized for desktop, tablet and mobile
- **Toast Notifications** - User feedback for all actions
- **Server-side Validation** - Robust form validation
- **Image Upload** - Restaurant photo management

### Restaurant Data Fields
- Name
- Picture (URL)
- Address (textarea)
- Cuisine (multi-select): Chinese, Italian, Indian, French, Greek, Japanese, Mexican, Macedonian, Spanish, Thai, American
- City (single select): Belgrade, Ljubljana, Sarajevo, Skopje, Sofia, Zagreb, Tirana, Athens, Podgorica
- Opening Date

## 🧪 Development Commands

- **Run tests**: `php artisan test`
- **Code formatting**: `./vendor/bin/pint`
- **Static analysis (PHPStan)**: `./vendor/bin/phpstan analyse`
- **Watch assets**: `npm run dev`
- **Fresh migration**: `php artisan migrate:fresh --seed`

## 🔧 Code Quality

This project maintains high code quality standards:
- Laravel Pint for code formatting
- PHPStan for static analysis
- Consistent naming conventions
- Comprehensive validation
- Proper error handling

## 📱 Responsive Design

The application is fully responsive and optimized for:
- Large screens (1200px+)
- Laptops (992px-1199px)
- Tablets (768px-991px)
- Mobile phones (<768px)

## 🚦 Git Workflow

This project follows GitFlow methodology:
- `main` - Production-ready code
- `develop` - Integration branch
- `feature/*` - Feature development
- `hotfix/*` - Emergency fixes

## 📝 Submission Checklist

- [x] Laravel Livewire implementation
- [x] PostgreSQL database with migrations
- [x] Database Seeders
- [x] Tailwind CSS styling (no external component libraries)
- [x] Responsive design for all devices
- [x] CRUD operations with proper validation
- [ ] Real-time filtering system
- [x] Toast notification system
- [x] Delete confirmation modal
- [x] Clean, documented code
- [x] Git history with meaningful commits
- [ ] Automated tests

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is created for assignment purposes and demonstrates Laravel Livewire development skills.

---

**Note**: This assignment showcases modern PHP development practices, Laravel framework expertise and the ability to create interactive web applications using Livewire's reactive components.