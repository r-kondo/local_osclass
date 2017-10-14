DROP TABLE IF EXISTS /*TABLE_PREFIX*/t_im_threads;
CREATE TABLE /*TABLE_PREFIX*/t_im_threads(
i_thread_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
s_title VARCHAR(200),
fk_i_item_id INT,
i_from_user_id INT,
s_from_user_name VARCHAR(100),
s_from_user_email VARCHAR(100),
i_from_user_notify INT(1) DEFAULT 1,
s_from_secret VARCHAR(20),
i_to_user_id INT,
s_to_user_name VARCHAR(100),
s_to_user_email VARCHAR(100),
i_to_user_notify INT(1) DEFAULT 1,
s_to_secret VARCHAR(20),
i_flag INT(1) DEFAULT 0,
d_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (i_thread_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';


DROP TABLE IF EXISTS /*TABLE_PREFIX*/t_im_messages;
CREATE TABLE /*TABLE_PREFIX*/t_im_messages(
pk_i_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
fk_i_thread_id INT,
i_type INT(1) DEFAULT 0,
i_read INT(1) DEFAULT 0,
i_email_sent INT(1) DEFAULT 0,
s_message VARCHAR(5000),
s_file VARCHAR(100),
d_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

