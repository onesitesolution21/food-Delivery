# Shop Application

A modern e-commerce platform built with Laravel 12, featuring a responsive frontend and a powerful admin dashboard powered by Filament.

## Features

### Frontend

- **Product Catalog**: Browse products organized by categories
- **Product Details**: View detailed product information with images
- **Shopping Cart**: Add, remove, and manage items in your cart
- **Checkout**: Complete purchase orders with account or guest checkout
- **User Dashboard**: Track your orders and purchase history
- **Responsive Design**: Mobile-friendly interface with Tailwind CSS

### Admin Dashboard (Filament)

- **Product Management**: Create, edit, and manage products
- **Category Management**: Organize products into categories
- **Order Management**: View and process customer orders
- **User Management**: Manage customer accounts
- **Inventory Management**: Track product stock levels

## Tech Stack

- **Backend**: [Laravel 12](https://laravel.com) - PHP web framework
- **Admin Panel**: [Filament 5.0](https://filamentphp.com) - Admin dashboard framework
- **Frontend**: [Livewire 4.1](https://livewire.laravel.com) - Reactive components
- **Styling**: [Tailwind CSS 4.0](https://tailwindcss.com) & Bootstrap 5
- **Build Tool**: [Vite](https://vitejs.dev) - Next-gen frontend tooling
- **Database**: Laravel Migrations (database agnostic)
- **Authentication**: Laravel built-in authentication
- **Shopping Cart**: [Shopping Cart](https://packagist.org/packages/anayarojo/shoppingcart)
- **Testing**: [Pest](https://pestphp.com)

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js 16+ & npm
- A database (SQLite, MySQL, PostgreSQL, etc.)

## Installation

### 1. Clone or Setup the Repository

```bash
cd your-project-directory
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Environment Configuration

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Run migrations
php artisan migrate

# (Optional) Seed sample data
php artisan db:seed
```

### 5. Create Storage Link

```bash
# Create symbolic link from public/storage to storage/app/public
php artisan storage:link
```

This command creates a symbolic link for serving files from the storage directory.

### 6. Install Frontend Dependencies

```bash
npm install
```

## Running the Application

### Development Mode

```bash
# Terminal 1: Start the development server
php artisan serve

# Terminal 2: Build frontend assets
npm run dev
```

The application will be available at `http://localhost:8000`

### Production Build

```bash
npm run build
```

### Quick Setup

Use the setup script to configure everything at once:

```bash
composer setup
```

This will:

- Install PHP dependencies
- Generate `.env` file
- Generate application key
- Run database migrations
- Install npm packages
- Build frontend assets

## Project Structure

```
├── app/
│   ├── Models/              # Eloquent models (Product, Category, Order, User, etc.)
│   ├── Http/
│   │   └── Controllers/     # Application controllers
│   ├── Filament/            # Filament admin panel resources
│   └── helper/              # Helper functions
├── config/                  # Configuration files
├── database/
│   ├── migrations/          # Database migrations
│   ├── factories/           # Model factories for testing
│   └── seeders/             # Database seeders
├── public/
│   ├── frontend/            # Frontend assets (CSS, JS, images)
│   └── index.php            # Application entry point
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Stylesheets
│   └── js/                  # JavaScript files
├── routes/
│   └── web.php              # Web routes
├── tests/                   # Test files
└── storage/                 # Application storage (logs, cache, etc.)
```

## Key Models

### Product

- Attributes: name, slug, price, quantity, sku, description, image, category_id
- Relationships: Category, OrderItems

### Category

- Organize products by category

### Order

- Tracks customer purchases with status and timestamps

### OrderItem

- Line items for orders with quantity and price

### User

- Customer accounts with authentication

## Available Routes

### Frontend Routes

- `GET /` - Home page
- `GET /shop` - Product listing
- `GET /shop/product-details/{slug}` - Product details
- `GET /shop/cart` - Shopping cart
- `GET /shop/checkout` - Checkout page
- `POST /checkout/store` - Process order
- `GET /contact` - Contact page

### User Routes

- `GET /user/dashboard` - Buyer dashboard
- `GET /user/orders` - Order history

### Admin Routes (Filament)

- `/admin` - Admin dashboard

## Testing

Run the test suite using Pest:

```bash
php artisan test
```

## Development Commands

```bash
# Generate new migration
php artisan make:migration migration_name

# Generate new model
php artisan make:model ModelName

# Generate new controller
php artisan make:controller ControllerName

# Clear all caches
php artisan cache:clear

# Start tinker (interactive shell)
php artisan tinker

# Format code with Pint
./vendor/bin/pint
```

## Documentation

For more information, refer to:

- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Livewire Documentation](https://livewire.laravel.com)

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For issues or questions, please create an issue in the repository or contact the development team.

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
