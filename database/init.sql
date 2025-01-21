-- Create database if not exists
CREATE DATABASE IF NOT EXISTS youdemy;

USE youdemy;

-- Create tables for user management
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    is_active BOOLEAN DEFAULT true,
    is_validated BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Create tables for course management
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FULLTEXT (name)
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    instructor_id INT NOT NULL,
    category_id INT NOT NULL,
    content_type ENUM('video', 'document') NOT NULL,
    content_url VARCHAR(255) NOT NULL,
    duration_minutes INT DEFAULT 0,
    price DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT true,
    FOREIGN KEY (instructor_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FULLTEXT (title, description)
);

CREATE TABLE course_tags (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

CREATE TABLE enrollments (
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Insert default roles
INSERT INTO roles (name) VALUES
('admin'),
('teacher'),
('student');

-- Insert admin user
INSERT INTO users (email, password, name, role_id, is_validated) VALUES
('admin@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Admin System', 1, true);

-- Insert sample teachers
INSERT INTO users (email, password, name, role_id, is_active, is_validated) VALUES
('teacher1@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Ilyas Raihani', 2, true, true),
('teacher2@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Mohamed koutari', 2, true, true),
('teacher3@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Younes zouihar', 2, true, true),
('teacher4@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'osama daria', 2, false, false),
('teacher5@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Hamza Atig', 2, false, false),
('teacher6@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Asmae alhamzaou', 2, false, false);

-- Insert sample students with default password 'password123'
INSERT INTO users (email, password, name, role_id, is_validated) VALUES
('student1@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Alice Brown', 3, true),
('student2@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Bob Wilson', 3, true),
('student3@youdemy.com', '$2y$10$4z5OOycdiSDbEsIoAOW9sO8laXM0icHpI3CjvJhYpC0zdUF2bum22', 'Charlie Davis', 3, true);

-- Insert categories
INSERT INTO categories (name, description) VALUES
('Développement Web', 'Apprenez les technologies web modernes'),
('Design', 'Maîtrisez les outils de design graphique'),
('Marketing Digital', 'Développez votre présence en ligne'),
('Business', 'Acquérez des compétences en affaires'),
('Langues', 'Apprenez de nouvelles langues'),
('Data Science', 'Explorez l''analyse de données'),
('Mobile Development', 'Créez des applications mobiles'),
('Cloud Computing', 'Maîtrisez les services cloud');

-- Insert tags
INSERT INTO tags (name) VALUES
('PHP'),
('JavaScript'),
('HTML'),
('CSS'),
('Python'),
('Java'),
('SQL'),
('Marketing'),
('Design'),
('Business'),
('React'),
('Angular'),
('Vue.js'),
('Node.js'),
('Laravel'),
('AWS'),
('Docker'),
('UI/UX'),
('SEO'),
('Git');

-- Insert sample courses with content
INSERT INTO courses (title, description, instructor_id, category_id, content_type, content_url, duration_minutes, price) VALUES
('Formation Complète PHP', 'Une formation complète sur PHP pour débutants, couvrant tous les aspects essentiels du développement web avec PHP', 2, 1, 'video', 'https://www.youtube.com/watch?v=t0syDUSbdfE', 420, 79.99),
('JavaScript pour Débutants', 'Maîtrisez JavaScript de zéro à héros avec ce cours complet pour débutants', 3, 1, 'video', 'https://www.youtube.com/watch?v=DHjqpvDnNGE', 360, 69.99),
('React JS Masterclass', 'Apprenez React JS avec des projets pratiques et des concepts avancés', 2, 1, 'video', 'https://www.youtube.com/watch?v=m6bveTwSjp0', 300, 89.99),
('Laravel pour Débutants', 'Découvrez le framework PHP Laravel et créez des applications web modernes', 4, 1, 'video', 'https://www.youtube.com/watch?v=MYyJ4PuL4pY', 280, 75.99),
('Python pour la Data Science', 'Analysez des données avec Python et ses bibliothèques populaires', 3, 6, 'video', 'https://www.youtube.com/watch?v=WGJJIrtnfpk', 240, 85.99),
('UI/UX Design Avancé', 'Maîtrisez les principes du design moderne et créez des interfaces utilisateur exceptionnelles', 2, 2, 'video', 'https://www.youtube.com/watch?v=55NvZjUZIO8', 180, 65.99);

-- Link courses with tags (using the correct course IDs)
INSERT INTO course_tags (course_id, tag_id) VALUES
-- Formation Complète PHP (ID: 1)
(1, 1),  -- PHP
(1, 3),  -- HTML
(1, 4),  -- CSS
(1, 7),  -- SQL

-- JavaScript pour Débutants (ID: 2)
(2, 2),  -- JavaScript
(2, 3),  -- HTML
(2, 4),  -- CSS

-- React JS Masterclass (ID: 3)
(3, 11), -- React
(3, 2),  -- JavaScript
(3, 14), -- Node.js

-- Laravel pour Débutants (ID: 4)
(4, 1),  -- PHP
(4, 15), -- Laravel
(4, 7),  -- SQL

-- Python pour la Data Science (ID: 5)
(5, 5),  -- Python

-- UI/UX Design Avancé (ID: 6)
(6, 9),  -- Design
(6, 18); -- UI/UX

-- Add enrollments (using the correct course IDs)
INSERT INTO enrollments (student_id, course_id) VALUES
(5, 1), -- Alice enrolled in PHP
(5, 2), -- Alice enrolled in JavaScript
(6, 3), -- Bob enrolled in React
(6, 4), -- Bob enrolled in Laravel
(7, 5), -- Charlie enrolled in Python
(7, 6); -- Charlie enrolled in UI/UX