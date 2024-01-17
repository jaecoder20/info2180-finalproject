# Dolphin CRM

This project was a collaborative effort to create a Customer Relationship Management (CRM) system that's designed to provide an initial Minimum Viable Product (MVP) for managing contacts and interactions with them. The system allows users to add new contacts, view contact details, and add notes about interactions. 

## Table of contents

- [Overview](#overview)
  - [Features](#features)
  - [The Database](#database)
    - [Users Table](#users-table)
    - [Contacts Table](#contacts-table)
    - [Notes Table](#notes-table)
  - [Screenshot](#screenshot)
  - [Built with](#built-with)
  - [What I learned](#what-i-learned)
  - [Future Improvements](#future-improvements)

## Overview
Dolphin CRM is a robust Customer Relationship Management (CRM) system designed to streamline user interactions and facilitate efficient contact management. The system incorporates various features to ensure a secure, user-friendly, and performant experience. 

### Features
  - User Authentication:
    - Enables users to log in using their email and password securely.
    - Implements PGP sessions for effective user session tracking.
     
  - User Management:
    - Admins can add new users, ensuring a controlled and authorized user base.
    - Enforces password security through regex expressions and employs hashing for secure storage in the database.
    - Implements a role-based access control (RBAC) system, distinguishing between admin and member roles.

  - Data Validation:
    - Ensures the integrity of the data by validating input fields.
    - Escapes and sanitizes user inputs before storage in the database, enhancing data security.

  - User Dashboard:
    - Provides users with a comprehensive dashboard, offering a clear overview of contacts and their relevant details.
    - Includes sorting options to facilitate efficient data organization.

  - Contact Management:
    - Enables users to  create new contacts, enhancing user flexibility.
    - Allows users to view detailed contact information, fostering informed decision-making.
    - Facilitates communication through the ability to send traceable notes to contacts.

  - User Interaction:
    - Implements a dynamic user interface with AJAX, eliminating the need for page refreshing.
    - Enhances user experience by providing real-time updates without disrupting the workflow.

### Database
The database contains three tables.
  #### Users Table:
  ![the structure and data types for users table](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/da1a8949-c4aa-4618-b6c9-f6b312edd899)
  #### Contacts Table:
  ![the structure and data types for contacts table](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/37e1f897-82bd-4e16-ba00-596b24fc1d13)

  #### Notes Table:
  ![the structure and data types for notes table](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/4f17bce7-8290-481e-b18b-1a90945d2ff6)

### Screenshots
![login page](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/66f9e38f-fb2d-431f-a35a-24698c5ff70e)
![dashboard displaying contacts](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/4d99d55f-667c-41b9-9992-25b3481b18a1)
![new contact form](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/6771f9e2-22d6-4ea0-a2c1-22042d0a6eb0)
![current system users](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/9d9941b8-7c63-410d-9993-d0d9126caec2)
![add new users](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/3c6b263e-a605-4b51-8ab0-caeb09c884c7)
![details for particular contact](https://github.com/jaecoder20/info2180-finalproject/assets/108883378/1af46b8d-6fbd-4862-bc6d-3ceea8f31168)

### Built with
- HTML
- CSS
- JS
- PHP
- SQL

### What I learned
- Client and Server-side validations
- A deeper appreciation for network security
- Asynchronous Javascript
- PHP Sessions
- Authentication
- Database

### Future Improvements
- Responsive design - currently the website only displays properly on some devices
- Ability to edit and delete users/contacts
- Writing notes will automatically send emails









