drop database if exists project0;
create schema project0;

use project0;

create table admin (
	username varchar(25) not null,
    password varchar(255) not null,
    primary key (username)
);

create table faculty(
	faculty_id varchar(10) not null,
    faculty_name varchar(100) not null,
    primary key (faculty_id)
);

create table instructor(
	instructor_id int auto_increment not null,
	instructor_name varchar(30) not null,
    faculty_id varchar(10) not null,
    primary key (instructor_id),
    foreign key (faculty_id) references faculty(faculty_id)
);

create table course(
	course_id varchar(10) not null,
    course_name varchar(50) not null,
    faculty_id varchar(10) not null,
    semester int not null,
    primary key (course_id),
    foreign key (faculty_id) references faculty(faculty_id)
);

create table teaches(
	teaches_id bigint auto_increment not null,
    instructor_id int not null,
    academicYear varchar(10) not null,
    course_id varchar(10) not null,
    last_updated date not null,
    primary key (teaches_id),
    foreign key (instructor_id) references instructor(instructor_id),
    foreign key (course_id) references course(course_id)
);

create table qgroup(
	qgroup_id int auto_increment not null,
    qgroup text not null,
    primary key (qgroup_id)
);

create table question(
	qgroup_id int not null,
	question_id int auto_increment not null,
    question text not null,
    primary key (question_id),
    foreign key (qgroup_id) references qgroup(qgroup_id)
);

create table point(
	teaches_id bigint not null,
    question_id int not null,
    totally_disagree int default 0 not null,
    disagree int default 0 not null,
    neutral int default 0 not null,
    agree int default 0 not null,
    totally_agree int default 0 not null,
    foreign key (teaches_id) references teaches(teaches_id) on delete cascade,
    foreign key (question_id) references question(question_id) on delete cascade,
    primary key (teaches_id, question_id)
);