create table class_room_student
(
   classroom_id int,
   student_id int
);

create table exam_type
(
   exam_type_id int,
   name varchar(10),
   desc1 varchar(10)
);

create table classroom
(
classroom_id int,
year varchar(10),
grade_id int,
section varchar(10),
status varchar(10),
remarks varchar(10),
teacher_id varchar(10)
);

create table grade
(
grade_id int,
name varchar(10),
desc1 varchar(10)
);

create table course
(
course_id int,
name varchar(10),
desc1 varchar(10),
grade_id int
);

create table teacher
(
teacher_id int,
fname varchar(10),
lname varchar(10),
dob varchar(10),
phone int,
mobile int,
status varchar(10),
address varchar(10)
);

create table student
(
student_id int,
fname varchar(10),
lname varchar(10),
dob varchar(10),
phone int,
mobile int,
parent_id varchar(10),
date_of_join varchar(10),
status varchar(10)
);

create table parent
(
parent_id varchar(10),
fname varchar(10),
lname varchar(10),
dob varchar(10),
phone int,
mobile int,
status varchar(10)
);

create table attendance
(
date varchar(10),
student_id int,
status varchar(10),
remarks varchar(10)
);

create table exam
(
exam_id int,
exam_type_id int,
name varchar(10),
start_date varchar(10)
);

create table exam_result
(
exam_id int,
student_id int,
course_id int,
marks varchar(10)
);

create table login
(
id varchar(10),
pwd varchar(10)
);

insert into login values('student','student');


create table user
(
id varchar(10),
pwd varchar(10)
);

create table signup
(
name varchar(40),
email varchar(40),
course varchar(40)
);

create table signin
(
email varchar(20)
);

create table contact
(
name varchar(40),
email varchar(40),
subject varchar(40),
message varchar(40)
);


