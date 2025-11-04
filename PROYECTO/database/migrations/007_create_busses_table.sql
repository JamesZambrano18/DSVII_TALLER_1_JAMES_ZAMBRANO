CREATE TABLE IF NOT EXISTS busses(
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_code VARCHAR(10) NOT NULL,
    schedule_id INT,
    FOREIGN KEY(schedule_id) REFERENCES schedules(id)
);