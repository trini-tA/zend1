-- scripts/data.sqlite.sql
--
-- You can begin populating the database with the following SQL statements.
 
INSERT INTO todo ( title, comment, created) VALUES
    ( 'title', 'Hello! Hope you enjoy this sample zf application!',
    DATETIME('NOW'));
INSERT INTO todo ( title, comment, created) VALUES
    ( 'title2', 'Baz baz baz, baz baz Baz baz baz - baz baz baz.',
    DATETIME('NOW'));