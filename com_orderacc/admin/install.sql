CREATE TABLE IF NOT EXISTS  #__organizer (
	`id` int(10) unsigned NOT NULL auto_increment,
	`dateadd` datetime,	
	`dateend` datetime,
	`dateendfact` datetime,
	`shortdesc` varchar(200),
  PRIMARY KEY  (`id`)
)