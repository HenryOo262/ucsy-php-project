use project0;

CREATE USER 'validator'@'localhost' IDENTIFIED BY 'validator2023';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'ucsy2023';

GRANT SELECT ON project0.admin TO 'validator'@'localhost';
GRANT SELECT ON project0.course TO 'validator'@'localhost';
GRANT SELECT ON project0.qgroup TO 'validator'@'localhost';
GRANT SELECT ON project0.question TO 'validator'@'localhost';