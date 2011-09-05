/* CREATE TABLE movements (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reason VARCHAR(50),
    when DATETIME DEFAULT NULL,
    amount INT UNSIGNED
);

/* Then insert some posts for testing: */
INSERT INTO movements (reason,when,amount)
    VALUES ('this is the first movement. ganva', NOW(), 100);
INSERT INTO movements (reason,when,amount)
    VALUES ('the second movement strikes ba(n)(c)k', NOW(), 200);

