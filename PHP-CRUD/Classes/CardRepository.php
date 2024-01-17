<?php

class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(array $data): void
    {
        $sql = "INSERT INTO cards (name, description) VALUES (?, ?)";
        $this->databaseManager->execute($sql, [$data['name'], $data['description']]);
    }


    // Get one
    public function find(int $id): array
    {
        $sql = "SELECT * FROM cards WHERE id = ?";
        return $this->databaseManager->queryOne($sql, [$id]);
    }

    // Get all
    public function get(): array
    {
        // TODO: Create an SQL query
        // TODO: Use your database connection (see $databaseManager) and send your query to your database.
        // TODO: fetch your data at the end of that action.
        // TODO: replace dummy data by real one
        return [
            ['name' => 'dummy one'],
            ['name' => 'dummy two'],
        ];

        
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}