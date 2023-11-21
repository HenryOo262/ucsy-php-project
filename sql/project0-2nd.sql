drop database if exists project0;
create schema project0;

use project0;

create table role (
    role_id int not null,
    role_name varchar(10) not null,
    primary key (role_id)
);

create table user (
	username varchar(255) not null,
    password varchar(255) not null,
    role_id int not null,
    primary key (username),
    foreign key (role_id) references role(role_id)
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
    email varchar(255) not null UNIQUE,
    primary key (instructor_id),
    foreign key (faculty_id) references faculty(faculty_id)
)auto_increment = 1;

create table course(
	course_id varchar(10) not null,
    course_name varchar(50) not null,
    faculty_id varchar(10) not null,
    primary key (course_id),
    foreign key (faculty_id) references faculty(faculty_id)
);

/* Lookup Table */
create table semester(
    semester_id int auto_increment not null,
    primary key (semester_id)
)auto_increment = 1;

/* Junction Table */
CREATE TABLE course_semester (
    course_id varchar(10) not null,
    semester_id INT not null,
    PRIMARY KEY (course_id, semester_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id),
    FOREIGN KEY (semester_id) REFERENCES semester(semester_id)
);

create table teaches(
	teaches_id bigint auto_increment not null,
    instructor_id int not null,
    academicYear varchar(10) not null,
    course_id varchar(10) not null,
    semester_id int not null,
    primary key (teaches_id),
    foreign key (instructor_id) references instructor(instructor_id),
    foreign key (course_id) references course(course_id),
    foreign key (semester_id) references semester(semester_id)
)auto_increment = 1;

create table qgroup(
	qgroup_id int auto_increment not null,
    qgroup text not null,
    primary key (qgroup_id)
)auto_increment = 1;

create table question(
	qgroup_id int not null,
	question_id int auto_increment not null,
    question text not null,
    primary key (question_id),
    foreign key (qgroup_id) references qgroup(qgroup_id)
)auto_increment = 1;

create table point(
	teaches_id bigint auto_increment not null,
    question_id int not null,
    totally_disagree int default 0 not null,
    disagree int default 0 not null,
    neutral int default 0 not null,
    agree int default 0 not null,
    totally_agree int default 0 not null,
    foreign key (teaches_id) references teaches(teaches_id) on delete cascade,
    foreign key (question_id) references question(question_id) on delete cascade,
    primary key (teaches_id, question_id)
)auto_increment = 1;

create table comment(
    comment_id bigint auto_increment not null,
    teaches_id bigint,
    comment text,
    primary key (comment_id),
    foreign key (teaches_id) references teaches(teaches_id)
)auto_increment = 1;