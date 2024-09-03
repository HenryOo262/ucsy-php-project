use project0;

CREATE USER 'validator'@'localhost' IDENTIFIED BY 'validator';
CREATE USER 'admin1'@'localhost'    IDENTIFIED BY 'admin';
CREATE USER 'admin2'@'localhost'    IDENTIFIED BY 'admin';
CREATE USER 'student'@'localhost'   IDENTIFIED BY 'student';

GRANT ALL PRIVILEGES ON *.* TO 'admin1'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'admin2'@'localhost';

GRANT SELECT ON project0.user TO 'validator'@'localhost';
GRANT SELECT ON project0.role TO 'validator'@'localhost';

GRANT SELECT ON project0.question        TO 'student'@'localhost';
GRANT SELECT ON project0.qgroup          TO 'student'@'localhost';
GRANT SELECT ON project0.course_semester TO 'student'@'localhost';
GRANT SELECT ON project0.teaches         TO 'student'@'localhost';
GRANT SELECT ON project0.instructor      TO 'student'@'localhost';
GRANT SELECT ON project0.course          TO 'student'@'localhost';
GRANT SELECT ON project0.point           TO 'student'@'localhost';
GRANT INSERT ON project0.point           TO 'student'@'localhost';
GRANT UPDATE ON project0.point           TO 'student'@'localhost';
GRANT INSERT ON project0.comment         TO 'student'@'localhost';