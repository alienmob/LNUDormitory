

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","username","$2y$10$NerVx9w3.CT57djN.YO8w.pe1gBR9X8.RZdypcTeNpDSQ7UUp71SO","Admin","Admin","Tacloban City","pantasgianila@gmail.com","09063774018","profile.jpg","2021-06-03 00:00:00");
INSERT INTO admin VALUES("9","Frazier","$2y$10$pZGblWZkqeRlypd04wH4teDcYkws8LpufaYYyJ3O836Tmiybrr2SW","Reuben","Frazier","Ut repellendus Modi","lyrav@mailinator.com","Excepteur ut aut qui","","2021-10-07 11:41:24");



CREATE TABLE `borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_borrow` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `equipment_id` (`equipment_id`),
  CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

INSERT INTO borrow VALUES("192","1800649","22","2021-09-26 16:51:05","0");



CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("1","Appliances");
INSERT INTO category VALUES("2","Hardware Supply");
INSERT INTO category VALUES("4","Furniture");
INSERT INTO category VALUES("5","Bed Equipment");



CREATE TABLE `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transient_id` varchar(100) NOT NULL,
  `room_id` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `date_out` date NOT NULL,
  `time_out` time NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transient_id` (`transient_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`transient_id`) REFERENCES `transient` (`transient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;




CREATE TABLE `checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transient_id` varchar(100) NOT NULL,
  `room_id` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `date_out` date NOT NULL,
  `time_out` time NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transient_id` (`transient_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`transient_id`) REFERENCES `transient` (`transient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO checkout VALUES("16","UON1059","2","2021-06-29","09:32:00","2021-06-30","09:32:00","0");
INSERT INTO checkout VALUES("17","UON1059","14","2021-07-29","09:33:00","2021-07-31","09:33:00","0");



CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO course VALUES("1","Bachelor of Science in Business Administration","BSBA");
INSERT INTO course VALUES("2","Bachelor of Science in Information Technology","BSIT");
INSERT INTO course VALUES("3","Bachelor of Science in Hospitality Management","BSHM");



CREATE TABLE `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity` bigint(255) NOT NULL,
  `quantity_used` bigint(255) NOT NULL,
  `quantity_service` bigint(255) NOT NULL,
  `quantity_unservice` bigint(255) NOT NULL,
  `quantity_total` bigint(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO equipments VALUES("20","S06","5","Mattress/Foam","12","0","13","2","15","0");
INSERT INTO equipments VALUES("21","P28","5","Pillow","25","0","25","20","45","0");
INSERT INTO equipments VALUES("22","K56","5","Blanket","24","1","26","4","30","0");
INSERT INTO equipments VALUES("23","D58","5","Bed Sheet","37","0","40","5","45","0");
INSERT INTO equipments VALUES("24","N34","1","Electric Fan","11","0","12","3","15","0");
INSERT INTO equipments VALUES("25","C94","2","Clothes Drawer","15","0","16","4","20","0");



CREATE TABLE `equipments_u` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity` bigint(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `equipments_u_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_category_id` (`event_category_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_category_id`) REFERENCES `event_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO event VALUES("20","2","fgdfgdfg","LNU Dorm Grounds","2021-07-05","10:36:00","11:36:00","Cancelled!");
INSERT INTO event VALUES("22","1","sdfsdf","LNU Dorm Building","2021-09-27","14:30:00","15:33:00","");



CREATE TABLE `event_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO event_category VALUES("1","Meeting");
INSERT INTO event_category VALUES("2","Clean Up Drive");
INSERT INTO event_category VALUES("4","Others");



CREATE TABLE `log_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfid_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rfid_id` (`rfid_id`),
  CONSTRAINT `log_book_ibfk_1` FOREIGN KEY (`rfid_id`) REFERENCES `students` (`rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

INSERT INTO log_book VALUES("136","9AB00DBF","2021-09-21","12:06 pm","12:06 pm");
INSERT INTO log_book VALUES("137","FADEEEBE","2021-09-21","12:06 pm","12:06 pm");
INSERT INTO log_book VALUES("138","0435A012","2021-09-21","12:59 pm","12:59 pm");
INSERT INTO log_book VALUES("139","9AB00DBF","2021-09-21","01:00 pm","01:00 pm");
INSERT INTO log_book VALUES("140","FADEEEBE","2021-09-21","01:03 pm","01:03 pm");
INSERT INTO log_book VALUES("141","9AB00DBF","2021-09-21","01:04 pm","");
INSERT INTO log_book VALUES("142","9AB00DBF","2021-10-05","10:42 pm","10:42 pm");
INSERT INTO log_book VALUES("143","0435A012","2021-10-05","10:45 pm","10:45 pm");



CREATE TABLE `paid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(15) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `receipt` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `paid_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

INSERT INTO paid VALUES("139","1800649","2021-10-04","2021-10-30","2021-10-04 14:33:28","1","profile.jpg");
INSERT INTO paid VALUES("140","1800234","2021-10-04","2021-10-30","2021-10-06 22:55:14","1","");
INSERT INTO paid VALUES("141","1800567","2021-10-04","2021-10-30","2021-10-06 22:55:29","1","");
INSERT INTO paid VALUES("142","1800649","2021-10-06","2021-11-01","2021-10-07 11:40:59","1","IMG_20211006_225035.png");



CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;




CREATE TABLE `pending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `decline` varchar(255) NOT NULL,
  `date_pending` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `equipment_id` (`equipment_id`),
  CONSTRAINT `pending_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pending_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;




CREATE TABLE `promissory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `pnote` varchar(255) NOT NULL,
  `date_promissory` timestamp NOT NULL DEFAULT current_timestamp(),
  `deadline` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `promissory_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;




CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_reports` timestamp NOT NULL DEFAULT current_timestamp(),
  `equipment_reports` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO reports VALUES("10","2021-09-21 18:10:33","Pillow","Added 5 Pillow as Serviceable Equipment");
INSERT INTO reports VALUES("11","2021-09-21 18:10:44","Electric Fan","Marked 1 Electric Fan as Unerviceable Equipment");
INSERT INTO reports VALUES("12","2021-09-21 18:10:54","Blanket","Marked 2 Blanket as Unerviceable Equipment");
INSERT INTO reports VALUES("13","2021-09-21 20:12:44","Bed Sheet","Added 5 Bed Sheet as Serviceable Equipment");
INSERT INTO reports VALUES("14","2021-09-21 20:13:01","Mattress/Foam","Marked 1 Mattress/Foam as Unerviceable Equipment");



CREATE TABLE `returns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_return` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `equipment_id` (`equipment_id`),
  CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `returns_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

INSERT INTO returns VALUES("85","1800649","21","2021-09-21 00:25:20");
INSERT INTO returns VALUES("86","1800649","24","2021-09-21 19:06:10");
INSERT INTO returns VALUES("87","1800649","22","2021-09-21 19:06:18");
INSERT INTO returns VALUES("88","1800649","22","2021-09-21 19:06:26");
INSERT INTO returns VALUES("89","1800649","21","2021-09-21 19:12:35");
INSERT INTO returns VALUES("90","1800649","21","2021-09-21 19:12:42");
INSERT INTO returns VALUES("91","1800649","21","2021-09-21 19:17:22");
INSERT INTO returns VALUES("92","1800649","21","2021-09-21 19:18:58");
INSERT INTO returns VALUES("93","1800649","21","2021-09-21 19:23:36");
INSERT INTO returns VALUES("94","1800649","21","2021-09-21 19:23:42");
INSERT INTO returns VALUES("95","1800649","21","2021-09-21 19:23:56");
INSERT INTO returns VALUES("96","1800649","21","2021-09-21 19:24:02");
INSERT INTO returns VALUES("97","1800649","20","2021-09-21 19:24:08");
INSERT INTO returns VALUES("98","1800649","21","2021-09-21 22:53:01");
INSERT INTO returns VALUES("99","1800567","21","2021-09-26 16:56:36");



CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO rooms VALUES("1","1-1","1st Floor - Room 1");
INSERT INTO rooms VALUES("2","1-2","1st Floor - Room 2");
INSERT INTO rooms VALUES("3","1-3","1st Floor - Room 3");
INSERT INTO rooms VALUES("4","1-4","1st Floor - Room 4");
INSERT INTO rooms VALUES("5","1-5","1st Floor - Room 5");
INSERT INTO rooms VALUES("6","2-1","2nd Floor - Room 1");
INSERT INTO rooms VALUES("7","2-2","2nd Floor - Room 2");
INSERT INTO rooms VALUES("8","2-3","2nd Floor - Room 3");
INSERT INTO rooms VALUES("9","2-4","2nd Floor - Room 4");
INSERT INTO rooms VALUES("10","2-5","2nd Floor - Room 5");
INSERT INTO rooms VALUES("11","3-1","3rd Floor - Room 1");
INSERT INTO rooms VALUES("12","3-2","3rd Floor - Room 2");
INSERT INTO rooms VALUES("13","3-3","3rd Floor - Room 3");
INSERT INTO rooms VALUES("14","3-4","3rd Floor - Room 4");
INSERT INTO rooms VALUES("15","3-5","3rd Floor - Room 5");
INSERT INTO rooms VALUES("16","4-1","4th Floor - Room 1");
INSERT INTO rooms VALUES("17","4-2","4th Floor - Room 2");
INSERT INTO rooms VALUES("18","4-3","4th Floor - Room 3");
INSERT INTO rooms VALUES("19","4-4","4th Floor - Room 4");
INSERT INTO rooms VALUES("20","4-5","4th Floor - Room 5");



CREATE TABLE `students` (
  `student_id` int(15) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `guardian_contact` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `rfid_id` (`rfid`),
  KEY `room_id` (`room_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO students VALUES("1800234","0435A012","$2y$10$uOEprdOjqZAKH5qEImdJYuCyFGg.BC89YsiCGRvGqJb5zy2hV0Wx6","Lynette","Pomasin","Female","Samar","+633653653445","pomasin@gmail.com","14","Athlete","Mrs. Pomasin","09123232233","","2","1","2021-07-08 23:30:17");
INSERT INTO students VALUES("1800567","9AB00DBF","$2y$10$diKHkQssg.oilu6jmSMHcuiK/WxQ22kRMFSbLakRcwhQ3s43IWLjm","Gia Nila","Pantas","Female","Tacloban City","+633653653445","gianila_pantas@gmail.com","16","Non-Athlete","Gil Pantas","09123456789","profile.jpg","2","1","2021-07-07 15:04:32");
INSERT INTO students VALUES("1800649","FADEEEBE","$2y$10$.DSpC1xUu0/flvPqHUKDju73wNkI0ZAKotDwRyUbQOMgJtm75dZv.","Jeremiah","Embana","Male","Brgy. 76 Fatima Village Tacloban City, Leyte","+639613057822","jeremiahembana22@gmail.com","20","Athlete","Jeany Embana","09063774018","ID PIC.png","2","1","2021-06-12 20:30:31");



CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO superadmin VALUES("1","mis","$2y$10$I5pKP20.JNB7RCWP6lszlugZwbMpElWXBdqM1Rvxgxoe2v2RjmuyG","mis","mis","","2021-06-24 15:04:30");



CREATE TABLE `transient` (
  `transient_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`transient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO transient VALUES("UON1059","Jeremiah","Embana","Male","Brgy. 76 Fatima Village Tacloban City, Leyte","09063774018","0","2021-06-29 09:32:19");



CREATE TABLE `unpaid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(15) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_unpaid` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `receipt` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `unpaid_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

INSERT INTO unpaid VALUES("167","1800234","2021-10-06","2021-11-01","2021-10-06 22:55:51","0","");
INSERT INTO unpaid VALUES("168","1800567","2021-10-06","2021-11-01","2021-10-06 22:55:51","0","");

