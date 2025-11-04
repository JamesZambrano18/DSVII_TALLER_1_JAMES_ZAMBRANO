CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    role_id INT,
    bus_id INT,
    FOREIGN KEY(role_id) REFERENCES roles(id),
    FOREIGN KEY(bus_id) REFERENCES busses(id)
);