<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class AddBookRepository
{
	/**
	 * @var PDO The database connection
	 */
	private $connection;

	/**
	 * Constructor.
	 *
	 * @param PDO $connection The database connection
	 */
	public function __construct(PDO $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * Insert user row.
	 *
	 * @param array $user The user
	 *
	 * @return int The new ID
	 */
	public function insertUser(array $user): int
	{
		$row = [
			'genre_id' => $user['genre_id'],
			'titre' => $user['titre'],
			'isbn' => $user['isbn'],
		];

		$sql = "INSERT INTO livres SET 
                genre_id=:genre_id, 
                titre=:titre, 
                isbn=:isbn;";

		$this->connection->prepare($sql)->execute($row);

		return (int)$this->connection->lastInsertId();
	}
}

