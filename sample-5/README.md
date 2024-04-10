# Project Name

## Description

This is a Laravel project that implements user authentication, product management, shopping cart functionality, checkout with Stripe payment integration, and a 5-level referral system.

## Installation

1. Clone this repository to your local machine.
2. Navigate to the project directory.
3. Run `composer install` to install dependencies.
4. Copy the `.env.example` file to `.env` and configure your environment variables.
5. Run `php artisan key:generate` to generate an application key.
6. Run `php artisan migrate` to run database migrations. 

## Usage

### 1: User Authentication and Registration

- Access the application and navigate to the registration page to create a new user account.
- Use the created credentials to log in to the application.
- Test cases for user authentication and registration are available in the `tests/Feature` directory.

### 2: Product Management, Shopping Cart, and Checkout

- After logging in, navigate to the product management section to add products.
- Users can add products to their shopping cart and proceed to the checkout page.
- Stripe payment integration is implemented for secure payments.
- Ensure Stripe API keys are properly configured in the `.env` file.

### 3: 5-Level Referral System

- Users can refer other users up to 5 levels deep.
- When a referred user makes a purchase, referral bonuses are distributed as follows:
  - 1st level: 5% of the paid amount
  - 2nd level: 4% of the paid amount
  - 3rd level: 3% of the paid amount
  - 4th level: 2% of the paid amount
  - 5th level: 1% of the paid amount

## Testing

Run `php artisan test` to execute all available tests.

## Contributing

Contributions are welcome. Please open an issue to discuss proposed changes or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
