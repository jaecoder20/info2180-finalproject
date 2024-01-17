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
  - [Continued development](#continued-development)

## Overview
Dolphin CRM is a robust Customer Relationship Management (CRM) system designed to streamline user interactions and facilitate efficient contact management. The system incorporates a range of features to ensure a secure, user-friendly, and performant experience. 

### Features
  - User Authentication:
    - Enables users to securely log in using their email and password.
    - Implements PGP sessions for effective user session tracking.
     
  - User Management:
    - Admins have the capability to add new users, ensuring a controlled and authorized user base.
    - Enforces password security through regex expressions and employs hashing for secure storage in the database.
    - Implements a role-based access control (RBAC) system, distinguishing between admin and member roles.

  - Data Validation:
    - Ensures the integrity of the data by validating input fields.
    - Escapes and sanitizes user inputs before storage in the database, enhancing data security.

  - User Dashboard:
    - Provides users with a comprehensive dashboard, offering a clear overview of contacts and their relevant details.
    - Includes sorting options to facilitate efficient data organization.

  - Contact Management:
    - Enables users to seamlessly create new contacts, enhancing user flexibility.
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




### Built with


### What I learned



### Continued development









