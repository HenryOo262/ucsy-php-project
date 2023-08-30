use project0;

insert into user values ('admin','$2y$10$ceDI2qGfgl7prCnOdO2J..pUdQyMR6foh3xI6bDznDxc0JmlW5iv2','admin'),
('banyar@ucsy.edu.mm','$2y$10$6gZsbqNRhQFCByMkgDVlT.T9c3Nm.Rsp875CTu.bhcvxTCoYBh8ce','student');

insert into faculty values
('FCST','Faculty of Computer Systems and Technologies'),
('FCS','Faculty of Computer Science'),
('FIS','Faculty of Information Science'),
('FC','Faculty of Computing'),
('DL','Department of Language'),
('DNS','Department of Natural Science'),
('DITSM','Department of Information Technology Supporting and Maintenance');

insert into instructor values (1,'Marlar Win Khin','FC','mlwinkhin@ucsy.edu.mm');
insert into instructor(instructor_name, faculty_id, email) values ('Marlar','FIS','marlar@ucsy.edu.mm'), ('San San','FC','sansan1@ucsy.edu.mm'), ('Hsu Yee','DITSM','hsuyee@ucsy.edu.mm'), ('Hsu Myat','FCS','hsumyat@ucsy.edu.mm'), ('Aye Aye','DL','aye2@ucsy.edu.mm'), ('Cho Cho San','FCST','chochosan@ucsy.edu.mm');

insert into semester values (1),(2),(3),(4),(5),(6),(7),(8),(9);

insert into course values ('CM-201','Discrete Mathematics','FC');
insert into course values ('CM-301','Introduction to Linear Algebra','FC');
insert into course values ('IS-101','Software Engineering 1','FIS');
insert into course values ('CST-201','Arduino Microcontrollers','FCST');

insert into course values ('Myan-101','Myanmar','DL');
insert into course values ('Eng-101','English','DL');
insert into course values ('Phy-101','Physics','DNS');
insert into course values ('CS-101','Principle of Information Technology','FCS');
insert into course values ('CM-101','Calculus 1','FC');

insert into course values ('Myan-102','Myanmar','DL');
insert into course values ('Eng-201','English','DL');

insert into course values ('CS-501','Mathematics of Computing','FC');

insert into course_semester values ('CM-201',2),   ('CM-301',4),  ('IS-101',4),  ('CST-201',4), ('CST-201',5), ('CS-501',9);
insert into course_semester values ('Myan-101',1), ('Eng-101',1), ('Phy-101',1), ('CS-101',1),  ('CM-101',1);
insert into course_semester values ('Myan-102',2), ('Eng-201',3);

insert into teaches values (1, 1, '2023-2024', 'CM-301', 4);
insert into teaches values (2, 3, '2022-2023', 'CM-301', 4);
insert into teaches values (3, 2, '2023-2024', 'IS-101', 2);
insert into teaches values (4, 1, '2020-2021', 'CM-301', 4);
insert into teaches values (5, 6, '2023-2024', 'Myan-101', 1);

insert into qgroup values (1,"သင်တန်းများ၏ ထိရောက်မှုနှင့် သင်တန်းဆရာများ၏ ထိရောက်မှု"), (2,"the name of group2 lorem"), (3,"the name of group3 lorem");

insert into question values (1,1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 1");
insert into question (qgroup_id,question) values (1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(1,"ဆရာမသည် စာသင်ချိန်ပြင်ပ သင်ခန်းစာများကို ရှင်းပြရန် ကြိုးစားသည်။"),
(1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(2,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(3,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(3,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(3,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2");
