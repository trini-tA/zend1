-- scripts/schema.sqlite.sql
--
-- You will need load your database schema with this SQL.
 
CREATE TABLE todo (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NULL,
    comment TEXT NULL,
    created DATETIME NOT NULL
);
 
CREATE INDEX "id" ON "todo" ("id");