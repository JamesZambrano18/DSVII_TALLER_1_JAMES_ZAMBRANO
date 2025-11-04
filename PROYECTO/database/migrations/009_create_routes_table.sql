CREATE TABLE IF NOT EXISTS routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_id INT,
    departure_location INT,
    arrival_location INT,
    FOREIGN KEY(bus_id) REFERENCES busses(id),
    FOREIGN KEY(departure_location) REFERENCES locations(id),
    FOREIGN KEY(arrival_location) REFERENCES locations(id)
);