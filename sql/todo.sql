ALTER TABLE User_Task
Modify Column Status tinyint(1) NOT NULL DEFAULT 0;



INSERT INTO Types (Task_Type) VALUES
('Daily'),
('Weekly'),
('Monthly');
