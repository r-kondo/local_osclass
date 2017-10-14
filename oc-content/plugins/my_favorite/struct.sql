CREATE TABLE IF NOT EXISTS oc_t_favorite (
    pk_i_id INT  UNSIGNED NOT NULL AUTO_INCREMENT,
    fk_i_user_id INT UNSIGNED,
    vote_user_id INT UNSIGNED,
    fk_i_item_id INT UNSIGNED,
 
        PRIMARY KEY (pk_i_id),
        FOREIGN KEY (fk_i_user_id) REFERENCES oc_t_user (pk_i_id),
        FOREIGN KEY (fk_i_item_id) REFERENCES oc_t_item (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE IF NOT EXISTS oc_t_favorite_config (
    pk_i_id INT  UNSIGNED NOT NULL AUTO_INCREMENT,
    type VARCHAR(20),
    val INT UNSIGNED,
 
        PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

INSERT INTO oc_t_favorite_config (type, val) VALUES ('disp_num', 10);