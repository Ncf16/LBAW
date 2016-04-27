DROP SCHEMA IF EXISTS proto CASCADE; 
CREATE SCHEMA proto; 
SET SCHEMA 'proto';

CREATE TABLE users (
  username varchar PRIMARY KEY,
  realname varchar NOT NULL,
  password varchar NOT NULL
);

CREATE TABLE tweets (
  id SERIAL PRIMARY KEY,
  time timestamp NOT NULL,
  username varchar REFERENCES users NOT NULL,
  text text NOT NULL
);

CREATE table follows (
  follower varchar REFERENCES users,
  followed varchar REFERENCES users,
  PRIMARY KEY (follower, followed)
);

INSERT INTO users VALUES ('john', 'John Doe', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
INSERT INTO users VALUES ('mary', 'Mary Jane', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
INSERT INTO users VALUES ('mike', 'Mike Tyson', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 10:41', 'john', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam magna arcu, dictum et bibendum a, volutpat sed mi. Maecenas facilisis.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 11:21', 'john', 'Nam congue erat eu lectus ullamcorper, sed ornare sapien interdum. Vestibulum rutrum adipiscing sed.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 12:35', 'mary', 'Etiam a arcu vitae augue varius posuere eget vitae lectus. Vivamus diam posuere.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 14:25', 'john', 'Praesent metus augue, suscipit at eleifend nec, pharetra vitae dolor. Morbi sed.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 14:41', 'mike', 'Donec quis augue vitae urna turpis duis.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 15:12', 'mary', 'Praesent a orci vitae urna molestie sed.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 16:46', 'mary', 'Sed sem nibh, facilisis in orci aliquam.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 16:54', 'john', 'Maecenas iaculis ante vel velit pharetra vulputate volutpat.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 17:39', 'john', 'Morbi commodo consequat turpis, vel hendrerit turpis nullam.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 19:54', 'mary', 'Vestibulum eget lectus molestie, convallis velit nec nullam.');
INSERT INTO tweets VALUES (DEFAULT, '2013-10-31 21:43', 'mike', 'Fusce quam lorem, dictum vitae ligula ut, molestie volutpat.');
INSERT INTO tweets VALUES (DEFAULT, '2013-11-01 09:41', 'mary', 'Quisque augue lectus, auctor at bibendum nec, lobortis amet.');
INSERT INTO tweets VALUES (DEFAULT, '2013-11-01 10:44', 'mary', 'Ut et tincidunt orci. Nulla facilisi. Sed egestas neque nec est metus.');
INSERT INTO tweets VALUES (DEFAULT, '2013-11-01 11:47', 'mike', 'Curabitur porttitor sem scelerisque nibh sagittis, ut tristique metus.');
INSERT INTO tweets VALUES (DEFAULT, '2013-11-01 11:49', 'john', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis ultricies nunc, eget condimentum nulla. Donec metus.');
INSERT INTO tweets VALUES (DEFAULT, '2013-11-01 11:55', 'mike', 'Etiam porta porttitor tempus. Fusce viverra nisi at tortor ultricies, sit amet consectetur lorem mattis. Maecenas metus.');

INSERT INTO follows VALUES ('mike', 'mary');
INSERT INTO follows VALUES ('mike', 'john');
INSERT INTO follows VALUES ('mary', 'mike');
INSERT INTO follows VALUES ('john', 'mary');