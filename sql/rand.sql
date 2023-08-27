use project0;

CREATE USER 'validator'@'localhost' IDENTIFIED BY 'validator2023';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'ucsy2023';
CREATE USER 'student'@'localhost' IDENTIFIED BY 'stud2022';

GRANT SELECT ON project0.admin TO 'validator'@'localhost';
/*
GRANT SELECT ON project0.course TO 'validator'@'localhost';
GRANT SELECT ON project0.qgroup TO 'validator'@'localhost';
GRANT SELECT ON project0.question TO 'validator'@'localhost';
*/

GRANT SELECT ON project0.question TO 'student'@'localhost';
GRANT SELECT ON project0.qgroup TO 'student'@'localhost';
GRANT SELECT ON project0.course_semester TO 'student'@'localhost';
GRANT SELECT ON project0.teaches TO 'student'@'localhost';
GRANT SELECT ON project0.instructor TO 'student'@'localhost';
GRANT SELECT ON project0.course TO 'student'@'localhost';
GRANT SELECT ON project0.point TO 'student'@'localhost';
GRANT INSERT ON project0.point TO 'student'@'localhost';
GRANT UPDATE ON project0.point TO 'student'@'localhost';
GRANT INSERT ON project0.comment TO 'student'@'localhost';