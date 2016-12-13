\c felizardo

-- user
insert into users (name, email, password, admin, remember_token, created_at, updated_at) values ('admin', 'admin@example.com', '$2y$10$Zr5QhIUDW54Kt8K5KlqBMOH0TlCGo2Bqb6zVzndxE2mDThb2IyOdC', true, 'z5CtLlsBNd09aXBdfsfDsLN67d3dfF3pPSmeMPvGfvCz4Cx1RuPUooVv3OWg', '2016-12-13 04:41:42', '2016-12-13 04:42:30');


-- pokemon
\copy pokemons from 'Pokemons.csv' with delimiter as ',' csv;