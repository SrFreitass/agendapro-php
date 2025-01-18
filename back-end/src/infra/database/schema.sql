CREATE TABLE IF NOT EXISTS roles (
    id VARCHAR(13) PRIMARY KEY,
    permissions TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(13) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id VARCHAR(13),
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS clients (
    id VARCHAR(13) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS places (
    id VARCHAR(13) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    capacity INT NOT NULL DEFAULT 1,
    image_url TEXT NOT NULL,
);

CREATE TABLE IF NOT EXISTS places_datetime (
    id VARCHAR(13) PRIMARY KEY,
    datetime_start TIMESTAMP NOT NULL,
    datetime_end TIMESTAMP NOT NULL,
    place_id VARCHAR(13),
    FOREIGN KEY (place_id) REFERENCES places(id)
);

CREATE TABLE IF NOT EXISTS reservations (
    id VARCHAR(13) PRIMARY KEY,
    client_id VARCHAR(13),
    place_id VARCHAR(13),
    place_datetime_id VARCHAR(13),
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (place_id) REFERENCES places(id),
    FOREIGN KEY (place_datetime_id) REFERENCES places_datetime(id)
);

-- 18/01/2025 - Add new columns in users

ALTER TABLE users ADD created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE users ADD updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE users ADD active BOOLEAN NOT NULL DEFAULT TRUE;