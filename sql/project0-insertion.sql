use project0;

insert into role values
(1,'admin'), (2,'student');

insert into user values 
('admin','$2y$10$ceDI2qGfgl7prCnOdO2J..pUdQyMR6foh3xI6bDznDxc0JmlW5iv2',1),
('adminthein','$2y$10$aLPHrUaTwOVNsK7kKV0m4ez0AOpfX5xmEEdP1VsqKwNCLlr0L8sOi',1),
('21370','$2y$10$6gZsbqNRhQFCByMkgDVlT.T9c3Nm.Rsp875CTu.bhcvxTCoYBh8ce',2),
('21371','$2y$10$.7yVuIhMxFJ2BE9An19goOadhf12B/xGf8F60cc9Wn/zpMVy8zvL2',2);

insert into faculty values
('FCST','Faculty of Computer Systems and Technologies'),
('FCS','Faculty of Computer Science'),
('FIS','Faculty of Information Science'),
('FC','Faculty of Computing'),
('DL','Department of Language'),
('DNS','Department of Natural Science'),
('DITSM','Department of Information Technology Supporting and Maintenance');

insert into instructor(instructor_name, faculty_id, email) values 
('Hsu Mo','FIS','hsumo@ucsy.edu.mm'),
('Thin Yu', 'FCS', 'thinyu@ucsy.edu.mm'),
('Nang Aye', 'FIS', 'nangaye@ucsy.edu.mm'),
('Cho Cho Su','FCST','chochosu@ucsy.edu.mm'),
('Win Marlar','FC','winml@ucsy.edu.mm'), 
('Hnin Yee', 'DL', 'hninyee@ucsy.edu.mm'),

('Marlar','FIS','marlar@ucsy.edu.mm'), 
('San San','FC','sansan1@ucsy.edu.mm'), 
('Hsu Yee','DITSM','hsuyee@ucsy.edu.mm'), 
('Hsu Myat','FCS','hsumyat@ucsy.edu.mm'), 
('Aye Aye','DL','aye2@ucsy.edu.mm'), 
('Hnin Pa Pa Lwin','FC','hpplwin@ucsy.edu.mm');

insert into semester values (1),(2),(3),(4),(5),(6),(7),(8),(9);

/* semester 1 */
insert into course values ('Myan-101','Myanmar','DL');
insert into course values ('Eng-101','English','DL');
insert into course values ('Phy-101','Physics','DNS');
insert into course values ('CS-101','Principle of Information Technology','FCS');
insert into course values ('CM-101','Calculus 1','FC');

insert into course_semester values ('Myan-101',1), ('Eng-101',1), ('Phy-101',1), ('CS-101',1), ('CM-101',1);

/* semester 2 */
insert into course values ('Myan-102','Myanmar','DL');
insert into course values ('Eng-102','English','DL');
insert into course values ('Phy-102','Physics','DNS');
insert into course values ('CS-201','Principle of Computer Science 1','FCS');
insert into course values ('CM-201','Discrete Mathematics','FC');

insert into course_semester values ('Myan-102',2), ('Eng-102',2), ('Phy-102',2), ('CS-201',2), ('CM-201',2);

/* semester 3*/
insert into course values ('Eng-201','English','DL');
insert into course values ('CS-202','Principle of Computer Science 1','FCS');
insert into course values ('CM-102','Calculus 1','FC');
insert into course values ('IS-201','Database 1','FIS');
insert into course values ('ITSM-101','Basic Web Programming','FCS');

insert into course_semester values ('Eng-201',3), ('CS-202',3), ('CM-102',3), ('IS-201',3), ('ITSM-101',3);

/* semester 4*/
insert into course values ('Eng-202','English','DL');
insert into course values ('CS-301','Data Structure and Algorithms','FIS');
insert into course values ('CM-301','Introduction to Linear Algebra','FC');
insert into course values ('IS-101','Software Engineering 1','FIS');
insert into course values ('CST-201','Arduino Microcontrollers','FCST');
insert into course values ('CS-204','PHP','FCS');

insert into course_semester values ('Eng-202',4), ('CS-301',4), ('CM-301',4), ('IS-101',4), ('CST-201',4);

insert into teaches values (2, 3, '2022-2023', 'CM-301', 4);
insert into teaches values (4, 1, '2020-2021', 'CM-301', 4);
insert into teaches values (5, 6, '2023-2024', 'Myan-101', 1);

insert into teaches(instructor_id, academicYear, course_id, semester_id) values 
(1, '2023-2024', 'IS-101', 4),
(2, '2023-2024', 'CS-204', 4),
(3, '2023-2024', 'CS-301', 4),
(4, '2023-2024', 'CST-201', 4),
(5, '2023-2024', 'CM-301', 4),
(6, '2023-2024', 'Eng-202', 4);

insert into qgroup values 
(1,"သင်ခန်းစာထိရောက်မှု၊ ဆရာ၊ဆရာမများသင်ကြားသည့်ပုံစံထိရောက်မှု"), 
(2,"ကျောင်းသားများလေ့လာသင်ကြားခြင်းထိရောက်မှု"), 
(3,"အထွေထွေသုံးသပ်ချက်");

insert into question (qgroup_id,question) values 
(1,"သင်ခန်းစာ၏ ပါ၀င်သည့်အကြောင်းအရာ၊ သင်ခန်းစာစီစဉ်ထားမှုနှင့် သင်ယူမှုလေ့ကျင့်ခန်းများသည် သင်ခန်းစာ၏ရည်ရွယ်ချက်များကို ထောက်ကူပေးသည်။"),
(1,"ဆရာ၊ဆရာမပြင်ဆင်ထားသောသင်ထောက်ကူပစ္စည်းများ (Power Point/ လိုအပ်သည့်စာရွက်စာတမ်းများ) သည် သင်ခန်းစာ၏ ဆိုလိုရင်းကို ကောင်းစွာသဘောပေါက် နားလည်နိုင်သည်။ "),
(1,"ဆရာ၊ဆရာမမှ ခက်ခဲသည့်အကြောင်းအရာများကို ဂရုတစိုက် ရှင်းပြသည်။"),
(1,"ဆရာ၊ဆရာမသည် ကျောင်းသူ၊ကျောင်းသားများ၏ လုပ်ဆောင်ချက်အပေါ်တွင် အကျိုးပြုသော/ကောင်းမွန်သော တုန့်ပြန်မှုကို ပေးပါသည်။"),
(1,"ဆရာ၊ဆရာမသည် ကျောင်းသား၊ ကျောင်းသူများအားအတန်းတွင် ပါ၀င်မှုကို အားပေးပါသည်။"),
(1,"ဆရာ၊ဆရာမသည် သက်ဆိုင်ရာဘာသာရပ်နှင့်ပါတ်သက်၍ လေးလေးနက်နက်စဉ်းစားရန် ကျောင်းသား၊ကျောင်းသူများအား တွန်းအားပေးပါသည်။ "),
(1,"ဆရာ၊ဆရာမသည် ကျောင်းသားက တောင်းဆိုသောအခါ အတန်းပြင်ပတွင်ရှင်းလင်းပြသပေးသည်။"),
(2,"ကျွန်တော်/ကျွန်မတို့သည် ဤအတန်းတွင် သင်ယူခြင်း၌ အကျိုးကျေးဇူးများစွာရှိသည်။ "),
(2,"သင်ကြားသောအကြောင်းအရာများသည် ဘာသာရပ်နှင့်ဆက်စပ်မှုရှိပါသည်။"),
(2,"စာမေးပွဲအစမ်းစစ်ဆေးခြင်းများနှင့်အခြားလိုအပ်သောလုပ်ဆောင်ချက်များသည် သင်ကြားသည့် အကြောင်းအရာနှင့်ဆက်စပ်မှုရှိပါသည်။ "),
(2,"အုပ်စုအဆင့်ခွဲခြားသတ်မှတ်ခြင်းများမှာ ရှင်းလင်းပြတ်သားမှုရှိပါသည်။"),
(2,"သင်ကြားရေးဆိုင်ရာကိစ္စရပ်များမှာ စိန်ခေါ်မှုတစ်ရပ်ဖြစ်ပါသည်။"),
(2,"သင်ခန်းစာ၏အဓိကဆိုလိုချက်များသည် နားလည်နိုင်မှုရှိသည်။"),
(3,"ခြုံငုံသုံးသပ်လျှင် ဆရာ၊ဆရာမ၏ကြိုးစားအားထုတ်မှုသည် ကျောင်းသား၊ ကျောင်းသူများအားအကျိုးရှိစေသည်။"),
(3,"ခြုံငုံသုံးသပ်လျှင် သင်ခန်းစာသည် ကျွန်တော်/ကျွန်မတို့အတွက် ဆက်လက်လေ့လာမှုအပေါ် အကျိုးရှိစေသည်။ "),
(3,"ဆရာ၊ဆရာမ၏ ထိရောက်စွာ သင်ကြားပြသမှု၊ဘာသာရပ်ဆိုင်ရာ ကျွမ်းကျင်မှုတို့ကြောင့် နောင် ဤဆရာ/ဆရာမ၏ အတန်းကို တက်ရောက်သင်ကြားလိုပါသည်။");
