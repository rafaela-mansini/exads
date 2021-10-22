CREATE TABLE IF NOT EXISTS `tv_series` (
  id INT AUTO_INCREMENT NOT NULL,
  title varchar(250) NOT NULL,
  channel varchar(250) NOT NULL,
  gender varchar(250) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS `tv_series_intervals` (
  id_tv_series INT AUTO_INCREMENT NOT NULL,
  week_day varchar(15) NOT NULL,
  show_time TIME NOT NULL,
  FOREIGN KEY(id_tv_series) REFERENCES tv_series(id)
) ENGINE=INNODB;

INSERT INTO tv_series SET title = 'Dark', channel = 'Netflix', gender = 'Thriller';
INSERT INTO tv_series SET title = 'Game of Thrones', channel = 'HBO', gender = 'Fantasy';
INSERT INTO tv_series SET title = 'Brooklin 99', channel = 'NBC', gender = 'Comedy';

INSERT INTO tv_series_intervals SET id_tv_series = 1, week_day = 'Monday', show_time = '20:00:00';
INSERT INTO tv_series_intervals SET id_tv_series = 1, week_day = 'Thursday', show_time = '22:00:00';
INSERT INTO tv_series_intervals SET id_tv_series = 2, week_day = 'Friday', show_time = '21:30:00';
INSERT INTO tv_series_intervals SET id_tv_series = 3, week_day = 'Tuesday', show_time = '20:00:00';