# 🚗 Car Renting System

A complete **Car Renting System** built using **Laravel**, **Vue.js**, and **Inertia.js**. This monolithic project offers seamless car rental management for customers and admins, ensuring a smooth and efficient experience.

## 📌 Features

### 🧑‍💼 Customer
- **Car Rental Creation**: Customers can rent a car by creating a rental request. The request includes the car name, rental duration , and additional data. After submitting the request, confirmation email will be sent to the customer. 
- **Authentication**: Secure login and registration for customers.
- **Access Control**: Customers must be logged in to create a rental.
- **Rental Tracking**: Customers can track their rental status from the dashboard.
- **Profile Management**: Update personal information from the profile section.

### 👨‍💻 Admin
- **Admin Authentication**: Secure login for admin (No registration allowed).
- **Car Management**: Create, edit, and delete cars available for rent.
- **Rental Management**: Track and update customer rental statuses.
- **Custom Rental Creation**: Admin can manually create rentals for customers.
- **View Rental History**: Access complete customer rental histories.

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Vue.js (Modern JavaScript Framework)
- **Routing & Data Handling**: Inertia.js
- **Database**: MySQL
- **Package Management**: Composer & npm

## 🚀 Installation Guide

1. **Clone the Repository:**
```bash
git clone https://github.com/your-username/car-renting-system.git
cd car-renting-system
```

2. **Set up Environment:**
```bash
cp .env.example .env
php artisan key:generate
```

3. **Install Dependencies:**
```bash
composer install
npm install
```

4. **Database Configuration:**
- Update `.env` with your database credentials.

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Build Frontend:**
```bash
npm run build
```

7. **Start the Application:**
```bash
php artisan serve
```

## 📄 Usage

1. Customers must register and log in to rent a car.
2. Admins manage cars and track customer rentals.
3. Admins can update the status of a rental (e.g., Pending, Ongoing, Completed).
4. Users can update their profiles and track their rental status.

## 📊 Project Structure

```
├── app/          # Laravel Backend
├── resources/    # Vue.js Frontend
├── routes/       # Web Routes
└── database/     # Migrations
```

## 🤝 Contributions

Contributions are welcome! Feel free to submit a Pull Request or open an issue.

## 📧 Contact
For questions or feedback, reach out to: [arifulislam6460@gmail.com](arifulislam6460@gmail.com)

---

**© 2025 Car Renting System: CODEARIF - Built with Laravel, Vue.js, and Inertia.js**

