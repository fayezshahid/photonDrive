# Photo Management System

Photon, a robust photo management platform built with PHP Laravel and MySQL. Features dynamic client-side interactions for favoriting, archiving, and sharing photos without page reloads, integrated with Google Drive API for secure cloud storage.

## 🛠️ Technologies Used

- **PHP Laravel** - Backend framework
- **MySQL** - Database management
- **Eloquent ORM** - Database handling
- **jQuery** - Client-side interactions
- **Google Drive API** - Cloud storage integration
- **XAMPP** - Local development environment

## 🚀 Getting Started

### Prerequisites

1. **Install XAMPP**
   - Download from [https://www.apachefriends.org/](https://www.apachefriends.org/)
   - Install and launch XAMPP Control Panel
   - **Enable Apache and MySQL** from the control panel

2. **Install Node.js and Composer**
   - Download Node.js from [https://nodejs.org/](https://nodejs.org/)
   - Download Composer from [https://getcomposer.org/](https://getcomposer.org/)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/fayezshahid/photonDrive.git
   cd photonDrive
   ```

2. **Environment Setup**
   ```bash
   # Create .env file and copy content from .env.example
   cp .env.example .env
   ```

3. **Database Setup**
   - Open phpMyAdmin (http://localhost/phpmyadmin) or whatever procedure you are familiar with to create a database in MySQL
   - Create a new database for your project
   - Update `.env` file with your database details and Google Drive API keys:
   
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_local_db_name
   DB_USERNAME=root
   DB_PASSWORD=
   
   # Google Drive API Configuration
   GOOGLE_DRIVE_CLIENT_ID=your_google_drive_client_id
   GOOGLE_DRIVE_CLIENT_SECRET=your_google_drive_client_secret
   GOOGLE_DRIVE_REFRESH_TOKEN=your_google_drive_refresh_token
   GOOGLE_DRIVE_FOLDER=your_google_drive_folder_id
   ```

4. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install Node.js dependencies
   npm install
   ```

5. **Laravel Setup**
   ```bash
   # Generate application key
   php artisan key:generate
   
   # Run database migrations
   php artisan migrate
   
   # Start the development server
   php artisan serve
   ```

## 🔑 Google Drive API Setup

To get your Google Drive API credentials:

1. **Create a Google Cloud Project**
   - Go to [Google Cloud Console](https://console.cloud.google.com/)
   - Create a new project or select existing one

2. **Enable Google Drive API**
   - Navigate to "APIs & Services" > "Library"
   - Search for "Google Drive API" and enable it

3. **Create Credentials**
   - Go to "APIs & Services" > "Credentials"
   - Click "Create Credentials" > "OAuth 2.0 Client IDs"
   - Configure consent screen if required
   - Set application type to "Web application"
   - Add authorized redirect URIs

4. **Get Refresh Token**
   - Use Google OAuth 2.0 Playground or implement OAuth flow
   - Generate refresh token using your client credentials

5. **Update .env file**
   - Add your client ID, client secret, refresh token, and folder ID to `.env`

6. **Access the application**
   - Open your browser and go to `http://localhost:8000`

## 🎯 Features

- **Dynamic Photo Management**: Upload, organize, and manage photos
- **Real-time Interactions**: Favorite, archive, and share without page reloads
- **Google Drive Integration**: Secure cloud storage for scalability
- **Efficient Database Handling**: Eloquent ORM for optimized queries
- **Responsive UI**: jQuery-powered smooth user experience

## 📁 Project Structure

```
photonDrive/
│
├── app/                    # Laravel application logic
├── database/              # Migrations and seeders
├── public/                # Public assets
├── resources/             # Views and frontend assets
├── routes/                # Application routes
├── .env.example           # Environment configuration template
└── README.md             # Documentation
```

## 🔧 Key Functionalities

- **Photo Upload & Storage**: Seamless integration with Google Drive API
- **Dynamic Actions**: jQuery-powered favoriting, archiving, sharing
- **Database Management**: Efficient data handling with Eloquent ORM
- **User Management**: Secure authentication and authorization
- **Responsive Design**: Mobile-friendly interface

## 🌐 API Integration

- **Google Drive API**: For secure photo storage and retrieval
- **RESTful Architecture**: Clean API endpoints for frontend interactions

## 🔮 Future Enhancements

- Add photo editing capabilities
- Implement advanced search and filtering
- Include photo tagging and categorization
- Add batch operations for multiple photos
- Integrate with other cloud storage providers