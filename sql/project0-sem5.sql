use project0;

insert into instructor values 
(1, 'Yu Paing',    'FC',    'yp@ucsy.edu.mm'),
(2, 'Amy',         'FCST',  'am@ucsy.edu.mm'),
(3, 'Khin Aye',    'FCST',  'ka@ucsy.edu.mm'),
(4, 'Ange',        'FCS',   'ae@ucsy.edu.mm'),
(5, 'May Kyaw',    'FIS',   'mk@ucsy.edu.mm'),
(6, 'Aye Maw',     'FCS',   'am@ucsy.edu.mm'),
(7, 'Hsu Mo',      'FIS',   'hm@ucsy.edu.mm'),
(8, 'Nwet Than',   'DITSM', 'nt@ucsy.edu.mm'),
(9, 'Sandi Aye',   'DITSM', 'sa@ucsy.edu.mm');

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
(101,1,'2023-2024','CM-103',5),
(102,2,'2023-2024','CST-301',5),
(103,3,'2023-2024','CST-401',5),
(104,4,'2023-2024','CS-501',5),
(105,5,'2023-2024','IS-402',5),
(106,6,'2023-2024','CS-302',5),
(107,7,'2023-2024','IS-102',5),
(108,8,'2023-2024','ITSM-301',5),
(109,9,'2023-2024','ITSM-204',5);