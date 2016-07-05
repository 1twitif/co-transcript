CREATE TABLE users  (
    username VARCHAR(50) PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password CHAR(60) NOT NULL,
    ranks VARCHAR(50)
);
CREATE TABLE documents (
    originalTitle VARCHAR(50) PRIMARY KEY,
    title VARCHAR(50),
    files TEXT,
    reservations VARCHAR(200),
    finished BOOL
);
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doc VARCHAR(50),
    author VARCHAR(50),
    dateReservation DATETIME,
    duration INTEGER,
    finished BOOL
);