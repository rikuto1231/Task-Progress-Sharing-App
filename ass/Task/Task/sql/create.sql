CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_nameID VARCHAR(10) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE Tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT AUTO_INCREMENT NOT NULL,
    task_name VARCHAR(50) NOT NULL,
    category ENUM('ページ', '問', 'タスク') NOT NULL,
    public_setting ENUM('公開', '非公開') DEFAULT '非公開' NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE Tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    task_name VARCHAR(50) NOT NULL,
    category ENUM('ページ', '問', 'タスク') NOT NULL,
    public_setting ENUM('公開', '非公開') DEFAULT '非公開' NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE TaskProgress (
    progress_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT NOT NULL,
    progress INT NOT NULL,
    record_date DATE NOT NULL,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id)
);