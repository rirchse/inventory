# Inventory Management System

A comprehensive inventory management solution designed specifically for local stores and businesses in Bangladesh. Built with Laravel 11, this system provides robust inventory tracking, sales management, and business operations tools tailored for the local market.

## 🏪 Features

### Core Inventory Management
- **Product Management**: Add, edit, and track products with detailed information
- **Category & Subcategory System**: Organize products with flexible categorization
- **Stock Tracking**: Real-time inventory levels and stock alerts
- **Unit Management**: Support for multiple units and unit conversions
- **Brand Management**: Organize products by brands

### Sales & Customer Management
- **Sales Processing**: Complete sales workflow with receipt generation
- **Customer Database**: Maintain customer information and purchase history
- **Payment Tracking**: Multiple payment methods and payment history
- **Sales Returns**: Handle product returns and refunds
- **Receipt Printing**: Generate and print sales receipts

### Purchase & Supplier Management
- **Purchase Orders**: Create and manage purchase orders
- **Supplier Management**: Maintain vendor/supplier information
- **Purchase Tracking**: Monitor incoming inventory and costs

### User & Security
- **Role-based Access Control**: Different user roles and permissions
- **User Management**: Add, edit, and manage system users
- **Secure Authentication**: Laravel-based security with password protection
- **Password Management**: Secure password change functionality

### Business Intelligence
- **Sales Reports**: Track sales performance and trends
- **Inventory Reports**: Monitor stock levels and movement
- **Customer Analytics**: Customer purchase patterns and preferences
- **Financial Tracking**: Payment and revenue monitoring

## 🚀 Technology Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Database**: MySQL/PostgreSQL
- **Frontend**: Blade templates with Laravel UI
- **Image Processing**: Intervention Image
- **Authentication**: Laravel built-in authentication system
- **Testing**: PHPUnit for testing

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- MySQL 5.7+ or PostgreSQL 9.6+
- Web server (Apache/Nginx)
- Node.js & NPM (for asset compilation)

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd inventory
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database in `.env` file**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventory_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed initial data (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Compile assets**
   ```bash
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🗄️ Database Structure

The system includes the following main entities:

- **Users**: System users with role-based access
- **Products**: Inventory items with categories and brands
- **Categories/Subcategories**: Product organization system
- **Stock**: Inventory levels and tracking
- **Sales**: Customer transactions and orders
- **Customers**: Customer information and history
- **Suppliers**: Vendor/supplier management
- **Purchases**: Incoming inventory tracking
- **Units**: Product measurement units
- **Payments**: Financial transaction tracking

## 🔐 Default Access

After installation, you can access the system with:
- **URL**: `http://localhost:8000`
- **Default Route**: Redirects to login page
- **First User**: Create through the signup process or database seeding

## 📱 Key Routes

- `/login` - User authentication
- `/home` - Dashboard (requires authentication)
- `/products` - Product management
- `/sales` - Sales processing and history
- `/customers` - Customer management
- `/suppliers` - Supplier/vendor management
- `/categories` - Category management
- `/users` - User management

## 🧪 Testing

Run the test suite using:
```bash
php artisan test
```

## 🚀 Deployment

For production deployment:

1. Set `APP_ENV=production` in `.env`
2. Configure production database
3. Set `APP_DEBUG=false`
4. Run `php artisan config:cache`
5. Run `php artisan route:cache`
6. Configure web server (Apache/Nginx)
7. Set up SSL certificate
8. Configure backup systems

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License.

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Contact the development team
- Check the Laravel documentation for framework-specific questions

## 🌟 Features for Bangladesh Market

This system is specifically designed with features relevant to local businesses in Bangladesh:

- **Bengali Language Support**: Ready for localization
- **Local Currency**: Taka (BDT) support
- **Local Business Practices**: Adaptable to local business workflows
- **Offline Capability**: Works with limited internet connectivity
- **Mobile Responsive**: Optimized for mobile devices commonly used in local businesses

---

**Built with ❤️ for local businesses in Bangladesh**
