-- migrate:up
create table todos (
    id int unsigned primary key auto_increment,
    title varchar(150) not null,
    description text not null,
    `status` enum ('OPEN', 'IN_PROGRESS', 'DONE') default 'OPEN',
    created_at timestamp default now(),
    updated_at timestamp default now(),
    user_id int unsigned not null,
    foreign key (user_id) references users(id) on delete cascade
)

-- migrate:down
DROP TABLE todos;
