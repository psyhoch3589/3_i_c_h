
CREATE TABLE info_user_connx(
`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE info_user_navigation(
`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
`age` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

