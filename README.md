# Quotient - Human Resource Management System

## Overview
**Quotient** is a comprehensive **Human Resource Management System (HRMS)** developed by **Impact Outsourcing**. It streamlines HR operations, offering powerful features for **leave management, employee management, leave roster management,** and a **dashboard** for real-time insights.

## Features
- **Employee Management**: Maintain detailed records of employees, including personal details, job roles, and employment history.
- **Leave Management**: Allow employees to apply for leave, track approvals, and manage leave balances.
- **Leave Roster Management**: Automate leave scheduling to prevent conflicts and ensure adequate workforce availability.
- **Dashboard**: Gain insights into HR metrics, leave statistics, and employee attendance.

## Installation
### Requirements
- PHP (Latest Version)
- Laravel Framework
- MySQL Database
- Apache/Nginx Web Server
- Node.js & NPM (for frontend assets, if applicable)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/impactdevs/Quotient.git
   ```
2. Navigate to the project directory:
   ```bash
   cd quotient
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
4. Configure the environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Set up the database:
   ```bash
   php artisan migrate --seed
   ```
6. Start the application:
   ```bash
   php artisan serve
   ```

## Usage
1. **Login** using administrator credentials.
2. **Add employees** and manage their details.
3. **Monitor HR activities** through the dashboard.


## Contact
For support or inquiries, reach out to **Impact Outsourcing** at [nsengiyumvawilberforce@gmail.com](mailto:nsengiyumvawilberforce@gmail.com).
