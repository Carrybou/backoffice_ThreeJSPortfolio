# Symfony API and Authentication Project

## Overview
This project is a Symfony-based backend application that includes:
- User registration and authentication with email verification.
- API endpoints for managing game scores.
- Communication with a mailer micro-service.
- JWT-based authentication and API security.
- Custom operations, filters, and extensions for API Platform.

## Features
1. **User Registration and Authentication**:
   - Users can register with an email and password.
   - Email verification is required to activate accounts.
   - Login is handled using a custom authenticator.

2. **Game Score Management**:
   - API endpoints to add and retrieve game scores.
   - Scores are linked to authenticated users.
   - Filters for searching and ordering scores.

3. **Mailer Micro-Service Communication**:
   - Sends emails via an external mailer micro-service using HTTP Client.

4. **API Security**:
   - JWT-based authentication for API endpoints.
   - Role-based access control for operations.

5. **Custom API Operations**:
   - Custom endpoints for specific actions (e.g., sharing scores).

6. **Data Validation**:
   - Assertions and custom validation rules for entities.



## Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js and npm
- Symfony CLI
- A database (e.g., MySQL or PostgreSQL)

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-folder>

2. Install PHP dependencies:
```bash
   composer install
```
3. Install JavaScript dependencies:
```bash
   npm install
```
4. Configure environment variables:
```bash
Copy .env to .env.local:
cp .env .env.local
```
5. Update database and mailer service configurations in .env.local.
- Generate JWT keys:
```bash
php bin/console lexik:jwt:generate-keypair
Run database migrations:
php bin/console doctrine:migrations:migrate
```
6. Start the Symfony server:
```bash
symfony server:start
```
