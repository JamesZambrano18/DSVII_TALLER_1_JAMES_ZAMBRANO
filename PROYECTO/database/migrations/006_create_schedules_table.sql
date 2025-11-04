CREATE TABLE IF NOT EXISTS schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    schedule_code VARCHAR(10) NOT NULL,
    shift_id INT,
    FOREIGN KEY(shift_id) REFERENCES shifts(id)
);