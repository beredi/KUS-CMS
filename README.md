# KUS-CMS

> PHP Content Management System for KUS Jana Kollara (folklore ensemble) - A responsive website with an admin panel for managing posts, events, members, users, and web content.

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-7952B3?style=flat&logo=bootstrap&logoColor=white)

## 📋 Table of Contents

- [Features](#-features)
- [Requirements](#-requirements)
- [Quick Start](#-quick-start)
- [Project Structure](#-project-structure)
- [Database Setup](#-database-setup)
- [Development](#-development)
- [Production Deployment](#-production-deployment)
- [Admin Panel](#-admin-panel)
- [Technologies](#-technologies)
- [License](#-license)

## ✨ Features

- 📝 **Content Management** - Create and manage articles, posts, and pages
- 📅 **Event Management** - Handle upcoming and past events
- 👥 **Member Directory** - Manage ensemble members and their information
- 🎥 **Video Gallery** - Showcase videos and multimedia content
- 📁 **File Management** - Upload and organize files and images
- 🔐 **User Management** - Admin panel with authentication and authorization
- 📱 **Responsive Design** - Mobile-friendly interface using Bootstrap
- 🎨 **WYSIWYG Editor** - CKEditor integration for rich text editing
- 🖼️ **Image Gallery** - Lightbox integration for photo galleries
- 🔍 **SEO Optimized** - Meta tags and clean URL structure

## 🛠 Requirements

- **PHP** 7.4 or higher (PHP 8.0+ recommended)
- **MySQL** 5.7 or higher / MariaDB 10.2+
- **Apache** (for production) or PHP built-in server (for development)
- **Composer** (optional, for dependency management)

### macOS Setup

```bash
# Install via Homebrew (if not already installed)
brew install php mysql

# Start MySQL service
brew services start mysql
```

## 🚀 Quick Start

### 1. Clone the Repository

```bash
git clone <repository-url>
cd KUS-CMS
```

### 2. Database Setup

Run the automated setup script:

```bash
chmod +x scripts/setup.sh
./scripts/setup.sh
```

This will:

- Create the `kusjanko_dashboard` database
- Create database user with proper permissions
- Import the SQL schema and data

### 3. Start Development Server

```bash
chmod +x scripts/start-server.sh
./scripts/start-server.sh
```

The site will be available at **http://localhost:8000**

## 📁 Project Structure

```
KUS-CMS/
├── css/                    # Bootstrap and custom stylesheets
├── js/                     # Bootstrap and custom JavaScript
├── images/                 # Image assets
│   ├── articles/          # Article images
│   ├── logos/             # Logo files
│   └── ludia/             # Member photos
├── includes/              # Reusable PHP components
│   ├── header.php         # Site header
│   ├── navbar.php         # Navigation menu
│   ├── footer.php         # Site footer
│   └── sidebar.php        # Sidebar widgets
├── dashboard/             # Admin panel
│   ├── index.php          # Admin dashboard
│   ├── posts.php          # Post management
│   ├── events.php         # Event management
│   ├── members.php        # Member management
│   ├── users.php          # User management
│   ├── videogallery.php   # Video gallery management
│   ├── ckeditor/          # WYSIWYG editor
│   └── includes/          # Admin includes
├── databasetools/         # Database backups and scripts
│   └── kusjanko_dashboard_2_10_2025.sql
├── scripts/               # Utility scripts
│   ├── setup.sh           # Database setup script
│   ├── start-server.sh    # Development server launcher
│   └── install-pdf-export.sh  # PDF export feature installer
├── index.php              # Homepage
├── about.php              # About page
├── contact.php            # Contact page
├── videogallery.php       # Video gallery
├── webdb.php              # Database configuration
└── router.php             # Development server router
```

## 🗄️ Database Setup

### Automated Setup (Recommended)

```bash
./scripts/setup.sh
```

### Manual Setup

1. **Create the database:**

```bash
mysql -u root -e "CREATE DATABASE kusjanko_dashboard CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

2. **Create database user:**

```bash
mysql -u root -e "CREATE USER 'kusjanko_admin'@'localhost' IDENTIFIED BY 'kusj4nkoll4r';"
mysql -u root -e "GRANT ALL PRIVILEGES ON kusjanko_dashboard.* TO 'kusjanko_admin'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"
```

3. **Import database:**

```bash
mysql -u root kusjanko_dashboard < ./databasetools/kusjanko_dashboard_2_10_2025.sql
```

### Database Configuration

Database credentials are stored in `webdb.php`:

```php
$servername = 'localhost';
$database = 'kusjanko_dashboard';
$username = 'kusjanko_admin';
$password = 'kusj4nkoll4r';
```

## 💻 Development

### Starting the Server

```bash
./scripts/start-server.sh
```

The development server uses a custom router (`router.php`) to simulate Apache's `.htaccess` URL rewriting.

### URL Rewriting

The project uses clean URLs without `.php` extensions:

- ✅ `http://localhost:8000/about`
- ✅ `http://localhost:8000/contact`
- ❌ `http://localhost:8000/about.php`

**Development:** Uses `router.php` for URL rewriting  
**Production:** Uses `.htaccess` for Apache mod_rewrite

### Making Changes

1. Edit PHP files directly in the project
2. Changes are reflected immediately (no build step required)
3. Refresh browser to see changes

## 🌐 Production Deployment

### Apache Configuration

1. **Upload files** to your web server via FTP/SFTP

2. **Configure database** in `webdb.php`

3. **Ensure `.htaccess` is enabled:**

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]
```

4. **Set proper permissions:**

```bash
chmod 755 dashboard/uploads
chmod 755 images
```

5. **Enable mod_rewrite** (if not already enabled):

```bash
a2enmod rewrite
systemctl restart apache2
```

## 🔐 Admin Panel

Access the admin panel at: **http://localhost:8000/dashboard**

### Default Features:

- 📊 Dashboard overview
- 📝 Posts and articles management
- 📅 Event management (upcoming & past)
- 👥 Member directory
- 👤 User management
- 🎥 Video gallery
- 📁 File manager
- ⚙️ Settings
- 📋 Activity logs

## 🔧 Technologies

### Frontend

- **Bootstrap 4** - Responsive CSS framework
- **jQuery** - JavaScript library
- **Lightbox2** - Image gallery lightbox
- **Font Awesome** - Icon toolkit

### Backend

- **PHP** - Server-side scripting
- **MySQL** - Relational database
- **PDO** - Database abstraction layer

### Admin Panel

- **CKEditor** - WYSIWYG text editor
- **DataTables** - Advanced table plugin
- **KCFinder** - File manager
- **Responsive FileManager** - Media management

## 📝 Notes

- This project uses **vanilla PHP** with no framework
- Session-based authentication
- PDO for database operations with prepared statements
- UTF-8 encoding for Slovak language support
- Mobile-responsive design

## 📧 Support

For issues or questions, please contact the development team.

---

**Built for KUS Jana Kollara** - Kultúrno-umelecký spolok Jána Kollára zo Selenče
