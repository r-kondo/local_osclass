CREATE TABLE oc_t_user_profile (
    fk_i_user_id INT(10) UNSIGNED NOT NULL unique,
    company_name VARCHAR(128) NULL,
    birthday DATE NULL,
    sex TINYINT(4) NULL,
    ice_phone VARCHAR(45) NULL,
    ice_relationship VARCHAR(16) NULL,
    image_path VARCHAR(250) NULL,
    room_image_path_1 VARCHAR(250) NULL,
    room_image_path_2 VARCHAR(250) NULL,
    room_image_path_3 VARCHAR(250) NULL,
    room_image_path_4 VARCHAR(250) NULL,
    room_image_path_5 VARCHAR(250) NULL,
    station_line VARCHAR(32) NULL,
    station_name VARCHAR(32) NULL,
    station_walk TINYINT(4) NULL,

    PRIMARY KEY (fk_i_user_id),
    FOREIGN KEY (fk_i_user_id) REFERENCES oc_t_user (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE oc_t_user_child_profile (
    id INT(10)  UNSIGNED NOT NULL AUTO_INCREMENT,
    fk_i_user_id INT(10) UNSIGNED NOT NULL,
    name VARCHAR(128) NULL,
    birthday DATE NULL,
    sex TINYINT(4) NULL,
    personality varchar(256) NULL,

        PRIMARY KEY (id),
        FOREIGN KEY (fk_i_user_id) REFERENCES oc_t_user (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE oc_t_sitter_profile (
    fk_i_user_id INT(10) UNSIGNED NOT NULL unique,
    birthday DATE NULL,
    ice_phone VARCHAR(45) NULL,
    ice_relationship VARCHAR(16) NULL,
    image_path VARCHAR(250) NULL,
    test_image_path VARCHAR(250) NULL,
    comment_image_path VARCHAR(250) NULL,
    nursery_exp tinyint(4) NULL,
    kindy_exp tinyint(4) NULL,
    childcare_exp tinyint(4) NULL,
    childcare_num tinyint(4) NULL,

    PRIMARY KEY (fk_i_user_id),
    FOREIGN KEY (fk_i_user_id) REFERENCES oc_t_user (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
