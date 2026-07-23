CREATE DATABASE IF NOT EXISTS hospital;

USE hospital;

-- =====================================
-- USERS TABLE
-- =====================================

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(150) NOT NULL,

    email VARCHAR(120) UNIQUE NOT NULL,

    phone VARCHAR(30) NOT NULL,

    password VARCHAR(255) NOT NULL,

    role ENUM('admin','doctor','patient') NOT NULL,

    status ENUM('active','pending','blocked')
    DEFAULT 'active',

    profile_image VARCHAR(255)
    DEFAULT 'default.png',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================
-- ADMINS TABLE
-- =====================================

CREATE TABLE admins (

    id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- =====================================
-- DOCTORS TABLE
-- =====================================

CREATE TABLE doctors (

    id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    specialization VARCHAR(150) NOT NULL,

    degree VARCHAR(150) NOT NULL,

    experience VARCHAR(100) NOT NULL,

    chamber_address TEXT NOT NULL,

    fees DECIMAL(10,2) DEFAULT 0,

    about TEXT,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- =====================================
-- PATIENTS TABLE
-- =====================================

CREATE TABLE patients (

    id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    gender ENUM('Male','Female','Other'),

    age INT,

    address TEXT,

    blood_group VARCHAR(20),

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- =====================================
-- SCHEDULES TABLE
-- =====================================

CREATE TABLE schedules (

    id INT AUTO_INCREMENT PRIMARY KEY,

    doctor_id INT NOT NULL,

    available_date DATE NOT NULL,

    start_time TIME NOT NULL,

    end_time TIME NOT NULL,

    status ENUM('available','booked')
    DEFAULT 'available',

    FOREIGN KEY (doctor_id)
    REFERENCES doctors(id)
    ON DELETE CASCADE
);

-- =====================================
-- APPOINTMENTS TABLE
-- =====================================

CREATE TABLE appointments (

    id INT AUTO_INCREMENT PRIMARY KEY,

    patient_id INT NOT NULL,

    doctor_id INT NOT NULL,

    schedule_id INT NOT NULL,

    appointment_date DATE NOT NULL,

    appointment_time TIME NOT NULL,

    status ENUM(
        'pending',
        'approved',
        'rejected',
        'completed'
    ) DEFAULT 'pending',

    notes TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
    REFERENCES patients(id)
    ON DELETE CASCADE,

    FOREIGN KEY (doctor_id)
    REFERENCES doctors(id)
    ON DELETE CASCADE,

    FOREIGN KEY (schedule_id)
    REFERENCES schedules(id)
    ON DELETE CASCADE
);

-- =====================================
-- PRESCRIPTIONS TABLE
-- =====================================

CREATE TABLE prescriptions (

    id INT AUTO_INCREMENT PRIMARY KEY,

    appointment_id INT NOT NULL,

    medicines TEXT NOT NULL,

    dosage TEXT NOT NULL,

    duration VARCHAR(100),

    tests TEXT,

    notes TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (appointment_id)
    REFERENCES appointments(id)
    ON DELETE CASCADE
);

-- =====================================
-- REPORTS TABLE
-- =====================================

CREATE TABLE reports (

    id INT AUTO_INCREMENT PRIMARY KEY,

    patient_id INT NOT NULL,

    doctor_id INT NOT NULL,

    report_name VARCHAR(255),

    report_file VARCHAR(255),

    report_type VARCHAR(100),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
    REFERENCES patients(id)
    ON DELETE CASCADE,

    FOREIGN KEY (doctor_id)
    REFERENCES doctors(id)
    ON DELETE CASCADE
);

-- =====================================
-- DEFAULT ADMIN
-- =====================================

INSERT INTO users
(
    full_name,
    email,
    phone,
    password,
    role,
    status
)

VALUES
(
    'Super Admin',

    'admin@hospital.com',

    '01700000000',

    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',

    'admin',

    'active'
);

INSERT INTO admins(user_id)
VALUES (1);