# 📊 Student Marks Calculator

A simple yet elegant Laravel web application for calculating student marks and determining pass/fail status.

## 🎯 Overview

The Student Marks Calculator is a Laravel-based educational tool that allows students to input their subject marks and receive instant feedback including total marks, average, and pass/fail determination.

## ✨ Features

✅ **Form Validation** - All fields validated with helpful error messages  
✅ **Mark Calculation** - Automatic total and average calculation  
✅ **Pass/Fail Status** - Determined by average (Pass ≥ 50)  
✅ **Clean UI** - Modern responsive design with gradient background  
✅ **Mobile Friendly** - Fully responsive on all devices  
✅ **Error Handling** - User-friendly validation feedback  

## 📋 Requirements Met

- ✅ Form with Student Name, Subject Marks 1, 2, 3
- ✅ Complete field validation
- ✅ Total marks calculation (sum of 3 marks)
- ✅ Average marks calculation (total / 3)
- ✅ Pass/Fail determination (Average ≥ 50)
- ✅ Results display on screen
- ✅ Routes, Controllers, Blade Views
- ✅ Professional UI/UX design

## 🛠️ Technical Stack

- **Framework**: Laravel 13.9.0
- **PHP Version**: 8.4+
- **Database**: SQLite
- **Frontend**: HTML5, CSS3
- **Templating**: Blade

## 📦 Installation

### Prerequisites
- PHP 8.0 or higher
- Composer
- Git (optional)

### Step 1: Clone or Download the Repository

```bash
# Using Git
git clone <repository-url>
cd "Assessment 01"

# Or navigate to the directory if already downloaded
cd "c:\Users\moham\Downloads\Assessment 01"
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Generate Application Key

```bash
php artisan key:generate
```

### Step 4: Run Database Migrations

```bash
php artisan migrate
```

## 🚀 How to Run

### Method 1: Using PHP Built-in Server (Recommended)

```bash
# Navigate to project directory
cd "c:\Users\moham\Downloads\Assessment 01"

# Start the development server
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

### Method 2: Using Custom Port

If port 8000 is already in use:

```bash
php artisan serve --port=8080
```

Then access at: **http://127.0.0.1:8080**

### Method 3: Using Apache/Nginx

Update your web server configuration to point to the `public` directory:

```
DocumentRoot: C:\Users\moham\Downloads\Assessment 01\public
```

## 📖 Usage Guide

### 1. **Access the Application**
   - Open your browser
   - Go to: `http://127.0.0.1:8000`

### 2. **Fill in the Form**
   - Enter Student Name (letters and spaces only)
   - Enter marks for Subject 1 (0-100)
   - Enter marks for Subject 2 (0-100)
   - Enter marks for Subject 3 (0-100)

### 3. **Submit Form**
   - Click "Calculate Marks" button
   - Or click "Clear Form" to reset

### 4. **View Results**
   - See total marks (out of 300)
   - See average marks
   - See Pass/Fail status
   - View detailed marks breakdown

### 5. **Calculate Again**
   - Click "Calculate Again" to perform another calculation

## 📊 Example Usage

### Input Example (Passing Student)
```
Name: John Doe
Subject 1: 75
Subject 2: 82
Subject 3: 68
```

### Output Example
```
Total Marks: 225/300
Average: 75.00
Status: PASS ✅
```

## 🔍 Validation Rules

The application validates the following:

- **Student Name**
  - Required
  - Letters and spaces only
  - Maximum 255 characters
  - Error: "Student name must contain only letters and spaces."

- **Subject Marks (1, 2, 3)**
  - Required
  - Must be numeric
  - Must be between 0-100
  - Specific error message for each field

## 📁 Project Structure

```
Assessment 01/
├── app/
│   └── Http/
│       └── Controllers/
│           └── StudentController.php
├── resources/
│   └── views/
│       └── student/
│           ├── form.blade.php
│           └── result.blade.php
├── routes/
│   └── web.php
├── public/
├── storage/
├── database/
├── vendor/
├── README.md (this file)
├── composer.json
└── .env
```

## 🎨 Key Files

### Controllers
- **StudentController.php** - Handles form display and mark calculations

### Views
- **student/form.blade.php** - Form input interface
- **student/result.blade.php** - Results display page

### Routes
- **routes/web.php** - Application routes

## 🔧 Configuration

### Environment Variables (.env)
```
APP_NAME="Student Marks Calculator"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=sqlite
```

## 🧪 Testing the Application

### Test Case 1: Valid Input
```
Name: Alice Johnson
Marks: 75, 82, 68
Expected Result: Pass (Average: 75.00)
```

### Test Case 2: Invalid Name
```
Name: John123
Expected: Validation error
```

### Test Case 3: Out of Range
```
Name: Bob Smith
Subject 1: 150
Expected: Validation error (exceeds 100)
```

### Test Case 4: Borderline Fail
```
Name: Charlie Brown
Marks: 49, 49, 49
Expected Result: Fail (Average: 49.00)
```

## 🚨 Troubleshooting

### Issue: Server won't start
**Solution**: 
```bash
# Check if port is in use
php artisan serve --port=8080
```

### Issue: Views not found
**Solution**:
```bash
php artisan view:clear
```

### Issue: Database error
**Solution**:
```bash
php artisan migrate:fresh
```

### Issue: Permission denied
**Solution**: Ensure you have write permissions to the storage and bootstrap directories

## 📱 Browser Compatibility

- ✅ Google Chrome
- ✅ Mozilla Firefox
- ✅ Microsoft Edge
- ✅ Safari
- ✅ Mobile browsers

## 🎓 Learning Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Blade Templating](https://laravel.com/docs/blade)
- [Validation](https://laravel.com/docs/validation)
- [Routing](https://laravel.com/docs/routing)

## 📞 Support

For detailed documentation, see:
- `STUDENT_CALCULATOR_README.md` - Complete documentation
- `IMPLEMENTATION_SUMMARY.md` - Technical implementation details
- `QUICK_START_GUIDE.md` - Testing guide

## 📄 License

This project is open source and available under the MIT license.

## ✅ Verification

Before using, verify:
- [ ] PHP version 8.0 or higher
- [ ] Composer installed
- [ ] All dependencies installed via `composer install`
- [ ] Database migrated via `php artisan migrate`
- [ ] Application key generated via `php artisan key:generate`
- [ ] Server running via `php artisan serve`
- [ ] Application accessible at `http://127.0.0.1:8000`

---

**Created**: May 15, 2026  
**Version**: 1.0.0  
**Status**: ✅ Complete and Ready to Use

Happy calculating! 📊

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
