use project0;

insert into instructor values 
(1, 'Yu Yu',     'FC',    'yp@ucsy.edu.mm'),
(2, 'Aye Aye',   'FCST',  'am@ucsy.edu.mm'),
(3, 'Khin Khin', 'FCST',  'ka@ucsy.edu.mm'),
(4, 'May Thu',   'FCS',   'ae@ucsy.edu.mm'),
(5, 'Moe Moe',   'FIS',   'mk@ucsy.edu.mm'),
(6, 'Maw Maw',   'FCS',   'am@ucsy.edu.mm'),
(7, 'Hsu Hsu',   'FIS',   'hm@ucsy.edu.mm'),
(8, 'Khine Khine', 'DITSM', 'nt@ucsy.edu.mm'),
(9, 'Aye Chan',    'DITSM', 'sa@ucsy.edu.mm');

insert into course values 
('CM-103',   'Differential Equations and Numerical Analysis', 'FC'),
('CST-301',  'Computer Architecture and Organization 1', 'FCST'),
('CST-401',  'Computer Network 1', 'FCST'),
('CS-501',   'Artificial Intelligence and Logic Programming', 'FCS'),
('IS-402',   'Information Security 1', 'FIS'),
('CS-302',   'Analysis of Algorithms', 'FCS'),
('IS-102',   'Data Modeling in Software Engineering', 'FIS'),
('ITSM-301', 'Human Computer Interaction', 'DITSM'),
('ITSM-204', 'Web Programming 2', 'DITSM');

insert into course_semester values 
('CM-103',5),
('CST-301',5),
('CST-401',5),
('CS-501',5),
('IS-402',5),
('CS-302',5),
('IS-102',5),
('ITSM-301',5),
('ITSM-204',5);

insert into teaches values 
(101,1,'2024-2025','CM-103',5),
(102,2,'2024-2025','CST-301',5),
(103,3,'2024-2025','CST-401',5),
(104,4,'2024-2025','CS-501',5),
(105,5,'2024-2025','IS-402',5),
(106,6,'2024-2025','CS-302',5),
(107,7,'2024-2025','IS-102',5),
(108,8,'2024-2025','ITSM-301',5),
(110,8,'2024-2025','ITSM-204',5),
(109,9,'2024-2025','ITSM-204',5);