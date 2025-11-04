CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    district VARCHAR(50) NOT NULL,
    street VARCHAR(50) NOT NULL,
    location_type_id INT,
    FOREIGN KEY(location_type_id) REFERENCES location_type(id)
);