use project0;

insert into instructor (instructor_id, instructor_name, faculty_id, email) values 
(211, 'Hnin Yin Mon',   'DL',    'hninyinmon@ucsy.edu.mm'),
(212, 'Mya Mya Hnin',   'FC',    'myamyahnin@ucsy.edu.mm'),
(213, 'Kyawt Mhuu',     'FCST',  'kyawtmhuu@ucsy.edu.mm'),
(214, 'Inzali Oo',      'FCST',  'inazlioo@ucsy.edu.mm'),
(215, 'Than Myint',     'FIS',   'thanmyint@ucsy.edu.mm'),
(216, 'Yu Akari',       'FCS',    'yuakari@ucsy.edu.mm'),
(217, 'Htike Htike',    'FIS',   'htikehtike@ucsy.edu.mm'),
(218, 'Hay Mar',        'FIS',   'haymar@ucsy.edu.mm'),
(219, 'Phyo Wutt Yee',  'DITSM', 'phyowuttyee@ucsy.edu.mm');

insert into course values 
('CM-211',   'Probability and Statistics with Python', 'FC'),
('CS-401',   'Operating Systems', 'FCS'),
('IS-202',   'Database Transaction Management', 'FCST'),
('CS-205',   'Web Development with Python', 'FCS'),
('IS-103',   'UML Design and Architecture', 'FIS'),
('Eng-301',  'English for Media', 'DL'),
('CST-404',  'Data and Computer Comms', 'FCST'),
('CST-402',  'Computer Network II', 'FCST'),
('IS-403',   'Cyber Security and Digital Forensics I', 'FIS'),
('IS-411',   'Information Security II', 'FIS'),
('ITSM-401', 'Financial and Management Accounting', 'DITSM');

insert into course_semester values 
('CM-211',6),
('CS-401',6),
('IS-202',6),
('CS-205',6),
('IS-103',6),
('ITSM-401',6),
('Eng-301',6),
('CST-404',6),
('CST-402',6),
('IS-403',6),
('IS-411',6);

insert into teaches values (311,212,'2024-2025','CM-211',6);
insert into teaches values (312,219,'2024-2025','ITSM-401',6);
insert into teaches values (314,216,'2024-2025','CS-401',6);
insert into teaches values (315,7,'2024-2025','IS-202',6);
insert into teaches values (316,218,'2024-2025','CS-205',6);
insert into teaches values (317,217,'2024-2025','IS-103',6);
insert into teaches values (318,211,'2024-2025','Eng-301',6);
insert into teaches values (319,214,'2024-2025','CST-404',6);
insert into teaches values (320,213,'2024-2025','CST-402',6);
insert into teaches values (321,215,'2024-2025','IS-403',6);
insert into teaches values (322,215,'2024-2025','IS-411',6);