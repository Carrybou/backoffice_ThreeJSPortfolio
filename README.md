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
