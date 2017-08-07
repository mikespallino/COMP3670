CREATE TABLE store_requests (
    item_id INT NOT NULL,
    num_of_requests INT NOT NULL,

PRIMARY KEY store_requests_pk
    (item_id, num_of_requests),
FOREIGN KEY store_requests_fk
    (item_id) REFERENCES store_items(item_id)
);