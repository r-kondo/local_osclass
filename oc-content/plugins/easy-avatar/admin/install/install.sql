CREATE TABLE IF NOT EXISTS /*TABLE_PREFIX*/t_user_esv_prof_links (
    `pk_i_id` INT(10) UNSIGNED NOT NULL ,
    `s_esv_fb_link` VARCHAR(40),
    `s_esv_tw_link` VARCHAR(40),
    `s_esv_lk_link` VARCHAR(40),
    `s_esv_gl_link` VARCHAR(40),
    PRIMARY KEY(`pk_i_id`),
    FOREIGN KEY (`pk_i_id`) REFERENCES /*TABLE_PREFIX*/t_user (`pk_i_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE IF NOT EXISTS /*TABLE_PREFIX*/t_user_esv_avatar_prf (
    `pk_i_id` INT(10) UNSIGNED NOT NULL ,
    `s_esv_avatar_prf` VARCHAR(40),
    PRIMARY KEY(`pk_i_id`),
    FOREIGN KEY (`pk_i_id`) REFERENCES /*TABLE_PREFIX*/t_user (`pk_i_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';