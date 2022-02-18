CREATE TABLE tt_content(
	tx_dvflexslider_settings_relation int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_dvflexslider_settings(
    title varchar(255) DEFAULT '[Development] Flexslider' NOT NULL,
	dvflexslider_items_relation int(11) unsigned DEFAULT '0' NOT NULL,
	animation varchar(80) NOT NULL,
	animationloop varchar(80) NOT NULL,
	randomize varchar(80) NOT NULL,
	pauseonhover varchar(80) NOT NULL,
	slideshowspeed int(11) DEFAULT '0' NOT NULL,
	animationspeed int(11) DEFAULT '0' NOT NULL,
	nexttext varchar(80) NOT NULL,
	prevtext varchar(80) NOT NULL,
	directionnav varchar(80) NOT NULL,
	controlnav varchar(80) NOT NULL
);



CREATE TABLE tx_dvflexslider_item (
	tx_dvflexslider_settings int(11) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	link varchar(255) DEFAULT '' NOT NULL,
	bodytext text,
	textcolor varchar(255) DEFAULT '' NOT NULL,
	backgroundcolor VARCHAR(255) DEFAULT '' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	contentposition varchar(255) DEFAULT '' NOT NULL
);
