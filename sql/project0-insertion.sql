use project0;

insert into admin values ('admin','$2y$10$ceDI2qGfgl7prCnOdO2J..pUdQyMR6foh3xI6bDznDxc0JmlW5iv2');

insert into faculty values
('FCST','Faculty of Computer Systems and Technologies'),
('FCS','Faculty of Computer Science'),
('FIS','Faculty of Information Science'),
('FC','Faculty of Computing'),
('DL','Department of Language'),
('DNS','Department of Natural Science'),
('DITSM','Department of Information Technology Supporting and Maintenance');

insert into instructor values (1,'Marlar Win Khin','FC');
insert into instructor(instructor_name, faculty_id) values ('Marlar','FIS'), ('San San','FC'), ('Hsu Yee','DITSM'), ('Hsu Myat','FCS'), ('Aye Aye','DL');

insert into course values ('CM-201','Discrete Mathematics','FC',2);
insert into course values ('CM-301','Introduction to Linear Algebra','FC',4);
insert into course values ('IS-101','Software Engineering 1','FIS',4);
insert into course values ('CST-201','Arduino Microcontrollers','FCST',4);

insert into course values ('Myan-101','Myanmar','DL',1);
insert into course values ('Eng-101','English','DL',1);
insert into course values ('Phy-101','Physics','DNS',1);
insert into course values ('CS-101','Principle of Information Technology','FCS',1);
insert into course values ('CM-101','Calculus 1','FC',1);

insert into course values ('Myan-102','Myanmar','DL',2);
insert into course values ('Eng-201','English','DL',3);

insert into course values ('CS-501','Mathematics of Computing','FC',9);

insert into teaches values (1, 1, '2023-2024', 'CM-301');
insert into teaches values (2, 3, '2022-2023', 'CM-301');
insert into teaches values (3, 2, '2023-2024', 'IS-101');
insert into teaches values (4, 1, '2020-2021', 'CM-301');
insert into teaches values (5, 6, '2023-2024', 'Myan-101');

insert into qgroup values (1,"သင်တန်းများ၏ ထိရောက်မှုနှင့် သင်တန်းဆရာများ၏ ထိရောက်မှု"), (2,"the name of group2 lorem"), (3,"the name of group3 lorem");

insert into question values (1,1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 1");
insert into question (qgroup_id,question) values (1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
(1,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus aspernatur consequatur, itaque inventore rem tempore necessitatibus! Sapiente quo delectus debitis. 2"),
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
