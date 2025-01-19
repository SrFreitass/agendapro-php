CREATE TABLE IF NOT EXISTS roles (
    id VARCHAR(13) PRIMARY KEY,
    permissions TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(13) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    role_id VARCHAR(13),
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    active BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS places (
    id VARCHAR(13) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    capacity INT NOT NULL DEFAULT 1,
    image_url TEXT NOT NULL,
    created_by VARCHAR(13),
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS reservations (
    id VARCHAR(13) PRIMARY KEY,
    user_id VARCHAR(13),
    place_id VARCHAR(13),
    datetime TIMESTAMP NOT NULL,
    active BOOLEAN NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (place_id) REFERENCES places(id)
);
