# SierraMind AI
![SierraMind AI Dashboard ](https://ai.peeap.com/public/uploads/20241104/c6b6e9eb5ef2e8aaf2b1feef1f89134c.png)

## Introduction

SierraMind AI is an advanced AI platform developed by Peeap Pay Limited. This application integrates a no-code/low-code chatbot builder, team management tools, and powerful transcription capabilities, all while providing users in Sierra Leone with premium access to leading AI models like ChatGPT-4, Gemini Pro, and Claude—all through a single subscription.

## Overview

SierraMind AI empowers users with versatile tools to enhance productivity and accessibility in education and business. With features like text-to-voice transcription, plagiarism checking, and the ability for schools to integrate their own AI keys, SierraMind AI is designed to meet diverse needs.

Visit the live site: [SierraMind AI](https://ai.peeap.com)

## Qcell Bot
here is a qcell dashbord that incoperate a nice ui and a chatbot that that has been train to answer all of qcell public support question for qmoney and qcell limited

![SierraMind AI Dashboard ](https://ai.peeap.com/public/uploads/20241104/3afee88c642fddd92b9682b02831736a.png)


### the qcell bot is now live you can access it on this link 
- **https://ai.peeap.com/chatbot/embed/chatbot_code=93bfce26d4b0477/welcome**
- 
![SierraMind AI Dashboard ](https://ai.peeap.com/public/uploads/20241104/9d812459580d9f8a5a00ff4adb0e7de5.png)
### Features

- **Team Management**: Efficiently manage teams and projects within the platform.
- **No-Code/Low-Code Chatbot Builder**: Create custom chatbots without any programming knowledge.
- **Transcription Services**: Convert text to voice with ease.
- **Premium AI Access**: Subscription includes access to ChatGPT-4, Gemini Pro, and Claude.
- **Plagiarism Checking**: Ensure originality and academic integrity with built-in plagiarism detection.
- **School Integration**: Schools can bring in their own AI keys for customized solutions.
- **Multi-Functional Platform**: All these features and more, centralized in one application.
- **Natural Language Processing (NLP)**: Enhancing communication through chatbots and language understanding.
- **Machine Learning Models**: Offering predictive analytics and data-driven insights to inform decision-making.
- **Custom AI Solutions**: Developing tailored applications to meet specific business needs, improving efficiency and productivity.

## Your can easily install and create an Ai services like this by simply folowing the Installation guide 

To set up your SierraMind AI application, follow the steps below to modify the `.env` file and spin up both the frontend and backend.

### Steps to Modify the `.env` File

1. **Locate the `.env` File**:
   - The `.env` file is typically found in the root of your Laravel application. Open your project directory to find this file.

2. **Open the `.env` File**:
   - Use a text editor (like VSCode, Sublime Text, or any code editor of your choice) to open the `.env` file.

3. **Edit Environment Variables**:
   - Modify the values of the following key variables as needed:
     - **APP_NAME**: Change the application name.
       ```plaintext
       APP_NAME=SierraMindAI
       ```
     - **APP_ENV**: Set the environment (e.g., local, production).
       ```plaintext
       APP_ENV=local
       ```
     - **APP_DEBUG**: Enable debugging mode (true/false).
       ```plaintext
       APP_DEBUG=true
       ```
     - **APP_URL**: Specify the application URL.
       ```plaintext
       APP_URL=http://yourdomain.com
       ```
     - **DB_CONNECTION**: Set the database connection type (mysql, sqlite, etc.).
       ```plaintext
       DB_CONNECTION=mysql
       ```
     - **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME**, **DB_PASSWORD**: Configure database connection details accordingly.
       ```plaintext
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=your_database
       DB_USERNAME=your_username
       DB_PASSWORD=your_password
       ```

4. **Save Changes**:
   - After making your changes, save the file. Ensure the file is saved with the same name `.env`.

5. **Clear the Cache** (if necessary):
   - Sometimes, you may need to clear the cache for changes to take effect. Run the following command in your terminal:
     ```bash
     php artisan config:cache
     ```

6. **Verify Changes**:
   - Test your application to ensure that the new configurations are working correctly.

### Running the Backend (Laravel PHP)

1. **Install Composer Dependencies**:
   - Navigate to your Laravel project directory and run:
     ```bash
     composer install
     ```

2. **Run Migrations**:
   - Set up your database by running the migrations:
     ```bash
     php artisan migrate
     ```

3. **Start the Laravel Development Server**:
   - Start the server by running:
     ```bash
     php artisan serve
     ```
   - Your Laravel backend will now be accessible at `http://localhost:8000`.

### Running the Frontend (React)

1. **Navigate to the Frontend Directory**:
   - Change into the React application directory (usually named `frontend` or similar):
     ```bash
     cd frontend
     ```

2. **Install NPM Dependencies**:
   - Install the required Node.js packages by running:
     ```bash
     npm install
     ```

3. **Start the React Development Server**:
   - Start the React application with:
     ```bash
     npm start
     ```
   - Your React frontend will now be accessible at `http://localhost:3000`.

## Important Notes

- **Security**: Be cautious while sharing your `.env` file as it contains sensitive information such as database credentials and API keys.
- **Version Control**: Generally, the `.env` file should not be committed to version control systems (like Git). Instead, maintain a `.env.example` file with the keys only, allowing other developers to create their own `.env` files with actual values.

## Conclusion

By following these steps, you can effectively configure and run both the frontend and backend of your SierraMind AI application. Ensure to adapt the values to suit your development or production environment needs. If you encounter any issues, check the Laravel and React documentation for more details on environment configuration and setup.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## Description

A starter application for new projects. Downsized from Sirra Mind  application.


#### Credentials

```text
Type:      Admin
URL:       /login
Username:  admin@peeap.com
Password:  123456
```

```text
Type:      qcell user
URL:       /login
Username:  demo@peeap.com
Password:  Qcell@2024

```


#### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


#### Contributors
mohamed abdul  - kabiacentral@gmail.com
sorie - almamun.tecl@gmail.com
Kabie - kabie@peeap.com
Abdul - dev@peap.com
