CREATE TABLE tx_edensite_slider_item (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    image int(11) unsigned DEFAULT '0' NOT NULL,
    link varchar(1024) DEFAULT '' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);

CREATE TABLE tx_edensite_quotation_item (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    quote text NOT NULL,
    author varchar(255) DEFAULT '' NOT NULL,
    role varchar(255) DEFAULT '' NOT NULL,
    image int(11) unsigned DEFAULT '0' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);

CREATE TABLE tx_edensite_map_marker (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    title varchar(255) DEFAULT '' NOT NULL,
    address text,
    latitude decimal(10,8),
    longitude decimal(11,8),
    color varchar(20) DEFAULT '' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);

CREATE TABLE tx_edensite_team_member (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    name varchar(255) DEFAULT '' NOT NULL,
    position varchar(255) DEFAULT '' NOT NULL,
    bio text,
    image int(11) unsigned DEFAULT '0' NOT NULL,
    social_links text,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);

CREATE TABLE tx_edensite_social_link (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    platform varchar(50) DEFAULT '' NOT NULL,
    url varchar(1024) DEFAULT '' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);


CREATE TABLE tx_edensite_map_marker_category (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    title varchar(255) DEFAULT '' NOT NULL,
    color varchar(20) DEFAULT '' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);

CREATE TABLE tx_edensite_map_marker_category_mm (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT '0' NOT NULL,
    parentid int(11) unsigned DEFAULT '0' NOT NULL,
    parenttable varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    
    PRIMARY KEY (uid),
    KEY parent (pid,parentid,parenttable)
);