CREATE TABLE users (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    status VARCHAR(120),
    avatar VARCHAR(120) NOT NULL,
    about_me VARCHAR(300),
    last_visit DATETIME,
    email VARCHAR(120) NOT NULL,
    password VARCHAR(48) NOT NULL,
    registration_date DATE NOT NULL,
    auth_key VARCHAR(48) NOT NULL
    )



    