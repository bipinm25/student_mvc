CREATE TABLE students(
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	dob DATE NULL,
	contact_no INT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

CREATE TABLE courses(
	id INT AUTO_INCREMENT PRIMARY KEY,
	course_name VARCHAR(255) NOT NULL,
	course_details TEXT NULL,	
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

CREATE TABLE course_subscribe(
	student_id INT NOT NULL,
	course_id INT NOT NULL	
) ENGINE=INNODB;


select concat(s.first_name,' ', s.last_name) full_name,c.course_name from course_subscribe cs left join students s on cs.student_id=s.id
 LEFT JOIN courses c ON cs.course_id=c.id order by s.first_name